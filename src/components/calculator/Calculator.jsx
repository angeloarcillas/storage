import { useState } from "react";

const Calculator = () => {
  const [input, setInput] = useState("");

  const nums = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
  const operators = ["+", "-", "*", "/"];

  const clickNum = (value) => {
    setInput(input + value.toString());
  };
  const clickOperator = (operator) => {
    setInput(input + operator);
  };

  const result = () => setInput(eval(input));
  const clear = () => setInput("");
  return (
    <div className="w-1/3 mx-auto m-12">
      <input
        value={input}
        readOnly
        className="w-full p-4 bg-blue-100 rounded-t text-right"
        type="text"
      />
      <div className="grid grid-cols-4 text-center">
        {nums.map((num, index) => (
          <span
            onClick={() => clickNum(num)}
            key={index}
            className="border p-4"
          >
            {num}
          </span>
        ))}
        {operators.map((operator, index) => (
          <span
            onClick={() => clickOperator(operator)}
            key={index}
            className="border p-4"
          >
            {operator}
          </span>
        ))}
        <span onClick={() => clear()} className="p-4 bg-red-400 col-span-2">
          clear
        </span>
        <span onClick={() => result()} className="p-4 bg-green-400">
          =
        </span>
      </div>
    </div>
  );
};

export default Calculator;
