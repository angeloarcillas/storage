import { PrismaClient } from "@prisma/client";
import { addListener } from "process";

// log: log every query
const prisma = new PrismaClient({ log: ["query"] });

async function main() {
  // ... you will write your Prisma Client queries here

  // create();
  // update();
  console.log(await findAll());
}

// create a record ============================================
async function create() {
  await prisma.user.create({
    // data to insert
    data: {
      name: "Alice2",
      email: "alice2@prisma.io",
      posts: {
        create: { title: "Hello World 2" },
      },
      profile: {
        create: { bio: "I like turtles 2" },
      },
    },
  });
}

// fetch all records ===========================================
async function findAll() {
  const allUsers = await prisma.user.findMany({
    where: {
      name: "Alice",
    },
    include: {
      posts: true,
      profile: true,
    },
  });
  console.dir(allUsers, { depth: null });
  return allUsers;
}

// update a record ============================================
async function update() {
  const post = await prisma.post.update({
    where: { id: 1 },
    data: { published: true },
  });

  console.log(post);
}

main()
  // catch errors
  .catch((e) => {
    throw e;
  })
  // disconnect prisma after transaction
  .finally(async () => {
    await prisma.$disconnect();
  });
