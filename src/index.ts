import express from "express";
import cors from "cors";

const app = express();

app.use(cors());
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

app.get("/", (req, res) => res.status(200).send("Hello World!"));

const port = process.env.PORT || 3001;
app.listen(port, () => console.log(`listening in: http://127.0.0.1:${port}`));

// COMMANDS RUN
// yarn add express
// yarn add -D typescript ts-node nodemon @types/express
// npx tsc init
// yarn add cors
// yarn add -D @types/cors
