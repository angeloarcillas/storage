import express from "express";
import cors from "cors";

// import /auth routes
import AuthRoute from './Routes/AuthRoute'

// create an express instance
const app = express();

// MIDDLEWARES
app.use(cors());
// parse json bodies
app.use(express.json());
// parse url-encoded bodies
app.use(express.urlencoded({ extended: true }));

// ROUTES
// use /auth routes
app.use("/auth", AuthRoute);

// use env port or 3000
const port = process.env.PORT || 3000;
// listen for connection
app.listen(port, () => {
  console.log(`connected: ${port}`);
});
