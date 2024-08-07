// Post Schema/Model
import mongoose from "mongoose";
import { Schema } from "mongoose";

class PostSchema extends Schema {
  constructor() {
    super({
      user: {
        type: Schema.Types.ObjectId,
        ref: "user",
      },
      text: {
        type: String,
        required: true,
      },
      name: {
        type: String,
      },
      avatar: {
        type: String,
      },
      likes: [
        {
          user: {
            type: Schema.Types.ObjectId,
            ref: "user",
          },
        },
      ],
      comments: [{ type: Schema.Types.ObjectId, ref: "comment" }],
      date: {
        type: Date,
        default: Date.now,
      },
    });
  }

  // Static method to find posts by user ID
  static async findByUserId(userId) {
    return this.find({ user: userId }).populate("user", "name avatar");
  }

  // Static method to add a comment to a post
  static async addComment(postId, comment) {
    return this.findByIdAndUpdate(
      postId,
      { $push: { comments: comment } },
      { new: true }
    );
  }
}

const Post = mongoose.model("post", new PostSchema());
export default Post;
