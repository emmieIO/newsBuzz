import User from "../models/User.js";
import { validateRegister, validateRequest } from "../utils/validation.js";
import { ApiError, handleError } from "../utils/errorUtils.js";
import { generateToken } from "../utils/jwt.js";


class AuthController {
  static register = [
    ...validateRegister(),
    validateRequest,
    async (req, res) => {
      try {
        const { name, email, password, confirmPassword } = req.body;
        const user = new User({ name, email, password });
        await user.save();
        const token = res
          .status(201)
          .json({ message: "User registered successfully", token: generateToken(user) });
      } catch (error) {
        handleError(new ApiError("Registration failed", 500), res);
      }
    },
  ];

  async login(req, res) {
    // login logic
  }
}
export default AuthController;
