// Description: Error handling utility functions.
export class ApiError extends Error {
  constructor(message, status) {
    super(message);
    this.status = status;
  }
}

export const handleError = (err, res) => {
  if (err instanceof ApiError) {
    return res.status(err.status).json({ message: err.message });
  } else {
    res.status(500).json({ error: "Internal server error" });
  }
};
