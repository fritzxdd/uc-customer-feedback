import React from "react";
import { createRoot } from "react-dom/client";
import CustomerFeedback from "./components/CustomerFeedback";

const root = document.getElementById("app");
if (root) {
    createRoot(root).render(<CustomerFeedback />);
}
