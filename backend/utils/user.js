//Desc: util functions to interact with the user model
import User from "../models/User.js";


export const userExists = async (email) => {
    return await User.findOne({email});
}

