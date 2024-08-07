import mongoose from "mongoose";
import { Schema } from "mongoose";

class CommentSchema extends Schema {
    constructor() {
        super({
            user: {
                type: Schema.Types.ObjectId,
                ref: "user",
            },
            text: {
                type: Stri4ng,
                required: true,
            },
            date: {
                type: Date,
                default: Date.now,
            },
        });
    }

    // Static method to find comments by user ID
    static async findByUserId(userId) {
        return this.find({ user: userId }).populate("user", "name avatar");
    }

}
