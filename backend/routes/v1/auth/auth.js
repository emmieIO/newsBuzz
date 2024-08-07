//Route auth.js
import { Router } from "express";
import AuthController from "../../../controllers/AuthController.js";
const router = Router();

router.post('/api/v1/auth/register', AuthController.register);

export default router;
