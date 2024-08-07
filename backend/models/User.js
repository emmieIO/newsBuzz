// User Model/Schema
import mongoose from "mongoose";
import { Schema } from "mongoose";
import { hashPassword } from "../utils/passwords.js";


class UserSchema extends Schema {
    constructor() {
        super({
            name: {
                type: String,
                required: true,
            },
            email: {
                type: String,
                required: true,
                unique: true,
            },
            password: {
                type: String,
                required: true,
            },
            bio: {
                type: String,
            },
            avatar: {
                type: String,
            },
            date: {
                type: Date,
                default: Date.now,
            }
        });
        this.pre("save", async function(next){
            if(this.isModified("password")){
                this.password = await hashPassword(this.password);
            }
            next();
        });

    }


}

const User = mongoose.model("user", new UserSchema());
export default User;