//Route index.js
import { Router } from "express";
import AuthRouterV1 from "./v1/auth/auth.js";

const router = Router();

router.use("", AuthRouterV1);

export default router;