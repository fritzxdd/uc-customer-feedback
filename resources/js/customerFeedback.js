import { useState } from "react";

export default function CustomerFeedback() {
  const [step, setStep] = useState("department");
  const [department, setDepartment] = useState("");
  const [window, setWindow] = useState("");
  const [rating, setRating] = useState("");
  const [comment, setComment] = useState("");

  const departments = ["Registrar", "EDP", "Accounting/Cashier"];
  const windows = [1, 2];
  const ratings = [
    { label: "😃 Excellent", value: "excellent" },
    { label: "🙂 Good", value: "good" },
    { label: "😐 Medium", value: "medium" },
    { label: "😕 Poor", value: "poor" },
    { label: "😡 Bad", value: "bad" },
  ];

  return (
    <div className="flex flex-col items-center justify-center min-h-screen bg-gray-100 text-center p-6">
      {step === "department" && (
        <div>
          <h1 className="text-2xl font-bold mb-4">Select Department</h1>
          {departments.map((dept) => (
            <button
              key={dept}
              className="bg-blue-500 text-white px-4 py-2 rounded m-2"
              onClick={() => {
                setDepartment(dept);
                setStep("window");
              }}
            >
              {dept}
            </button>
          ))}
        </div>
      )}

      {step === "window" && (
        <div>
          <h1 className="text-2xl font-bold mb-4">Select Window for {department}</h1>
          {windows.map((win) => (
            <button
              key={win}
              className="bg-green-500 text-white px-4 py-2 rounded m-2"
              onClick={() => {
                setWindow(win);
                setStep("rating");
              }}
            >
              Window {win}
            </button>
          ))}
        </div>
      )}

      {step === "rating" && (
        <div>
          <h1 className="text-2xl font-bold mb-4">Rate Window {window} - {department}</h1>
          {ratings.map((rate) => (
            <button
              key={rate.value}
              className="bg-yellow-500 text-white px-4 py-2 rounded m-2"
              onClick={() => {
                setRating(rate.value);
                setStep("commentOption");
              }}
            >
              {rate.label}
            </button>
          ))}
        </div>
      )}

      {step === "commentOption" && (
        <div>
          <h1 className="text-2xl font-bold mb-4">Would you like to leave a comment?</h1>
          <button
            className="bg-purple-500 text-white px-4 py-2 rounded m-2"
            onClick={() => setStep("comment")}
          >
            Yes
          </button>
          <button
            className="bg-red-500 text-white px-4 py-2 rounded m-2"
            onClick={() => setStep("thankYou")}
          >
            No
          </button>
        </div>
      )}

      {step === "comment" && (
        <div>
          <h1 className="text-2xl font-bold mb-4">Leave a Comment</h1>
          <textarea
            className="border p-2 w-80"
            value={comment}
            onChange={(e) => setComment(e.target.value)}
          ></textarea>
          <br />
          <button
            className="bg-indigo-500 text-white px-4 py-2 rounded m-2"
            onClick={() => setStep("thankYou")}
          >
            Submit
          </button>
        </div>
      )}

      {step === "thankYou" && (
        <div>
          <h1 className="text-2xl font-bold mb-4">Thank You for Your Feedback!</h1>
          <button
            className="bg-gray-500 text-white px-4 py-2 rounded m-2"
            onClick={() => setStep("department")}
          >
            Restart
          </button>
        </div>
      )}
    </div>
  );
}
