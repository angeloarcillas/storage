import express from "express";
import * as mongodb from "./../Database/mongodb";

// create an express router instannce
const router = express.Router();

// create a user
router.post("/register", async (req, res) => {
  const result = await mongodb.create(req.body);

  if (result) return res.status(201).send(result);

  return res.status(503).json({ error: "registration failed." });
});

// login user
router.post("/login", async (req, res) => {
  const result = await mongodb.find(req.body);

  if (result) return res.status(200).send(result);

  return res.status(503).json({ error: "User not found." });
});

// update user
router.put("/:id/update", async (req, res) => {
  const result = await mongodb.update(req.params.id, req.body);

  if (result) return res.status(200).send(result);

  return res.status(503).json({ error: "Failed updating user." });
});

// delete a user
router.delete("/:id/delete", async (req, res) => {
  const result: any = await mongodb.remove(req.params.id);

  if (result?.deletedCount > 0) return res.status(204).send("deleted.");

  return res.status(503).json({ error: "failed deleting user." });
});

export default router;
