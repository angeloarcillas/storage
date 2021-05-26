// import mongodb driver
import { MongoClient, ObjectID, Collection, Db } from "mongodb";
// import config
import { db } from "./../config";

type QueryProps = (
  table: Collection<any>,
  stmt: {},
  type: string,
  filter: {}
) => Promise<unknown | undefined>;

type RunProps = (
  stmt: {},
  type: string,
  filter?: {}
) => Promise<unknown | undefined>;

// TODO: implement this: type MethodProps = (id?: string, stmt?: {}) => Promise<unknown | undefined>;

// set uri connection
const uri: string = `${db.protocol}://${db.usename}:${db.password}@${db.host}/myFirstDatabase?${db.options}`;

// create a mongo instance
const client: MongoClient = new MongoClient(uri, {
  useNewUrlParser: true,
  useUnifiedTopology: true,
  connectTimeoutMS: 30000,
  keepAlive: true,
});

const query: QueryProps = async (table, stmt, type, filter) => {
  switch (type) {
    case "find":
      return await table.find(stmt).toArray();

    case "findOne":
      return await table.findOne(stmt);

    case "insertOne":
      return await table.insertOne(stmt);

    case "updateOne":
      return await table.updateOne(filter, stmt);

    case "deleteOne":
      return await table.deleteOne(stmt);

    default:
      return undefined;
  }
};

const run: RunProps = async (stmt, type, filter = {}) => {
  try {
    // connect to mongo
    await client.connect();
    // select database
    const database: Db = client.db("test");
    //select collection
    const table: Collection<any> = database.collection("users");
    // Query
    return await query(table, stmt, type, filter);
  } catch (error) {
    console.dir(error);
  } finally {
    // Ensures that the client will close when you finish/error
    await client.close();
  }
};

const all = async (stmt: {}) => {
  return await run(stmt, "find");
};

const find = async (stmt: {}) => {
  return await run(stmt, "findOne");
};

const create = async (stmt: {}) => {
  return await run(stmt, "insertOne");
};

const update = async (id: string, stmt: {}) => {
  const filter = { _id: new ObjectID(id) };
  return await run({ $set: stmt }, "updateOne", filter);
};

const remove = async (id: string) => {
  return await run({ _id: new ObjectID(id) }, "deleteOne");
};

export { all, find, create, update, remove };
