//desc: util for validating user input
import { body, validationResult } from "express-validator";
import { userExists } from "./user.js";

export const validateRegister = ()=> [
    body("name").notEmpty().withMessage("Name is required"),
    body("email").notEmpty().withMessage("Email is required"),
    body("email").isEmail().withMessage("Email is invalid"),
    body("email").custom(async (email) => {
        if(await userExists(email)){
            throw new Error("Email already exists");
        }
    }),
    body("password").isLength({ min: 6 }).withMessage("Password must be at least 6 characters"),
    body("confirmPassword").custom((confirmPassword, { req }) => {
        if(confirmPassword !== req.body.password){
            throw new Error("Passwords must match");
        }
        return true;
    }),
    body("confirmPassword").notEmpty().withMessage("Confirm password is required"),
    body("password").notEmpty().withMessage("password is required")

]

export const validateRequest = (req, res, next) => {
    const errors = validationResult(req);
    if(errors.isEmpty()){
        return next();
    }
    return res.status(400).json({ errors: errors.array() });
}