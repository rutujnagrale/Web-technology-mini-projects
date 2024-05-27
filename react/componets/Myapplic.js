import React, { useState } from "react";

function MyApplic() {
    const [inputVal, setInputVal] = useState(0);
    const [outputVal, setOutputVal] = useState(0);

    const handleChange = (event) => {
        setInputVal(event.target.value);
    }

    const submission = (event) => {
        event.preventDefault();
        let input = parseFloat(inputVal);
        let output = 0;

        if (input < 50) {
            output = 3.50 * input;
        } else if (input < 100) {
            output = 3.50 * 50 + 4.50 * (input - 50);
        } else if (input < 150) {
            output = 3.50 * 50 + 4.50 * 50 + 5.50 * (input - 100);
        } else {
            output = 3.50 * 50 + 4.50 * 50 + 5.50 * 50 + 6.50 * (input - 150);
        }

        setOutputVal(output);
        setInputVal(0);
    }

    return (
        <>
            <div>
                <form onSubmit={submission}>
                    <label>Enter the usage input in unit:</label>
                    <input
                        type="number"
                        onChange={handleChange}
                        value={inputVal}
                    />
                    <button type="submit">
                        Convert
                    </button>
                </form>
            </div>
            <div>
                <p>Output: {outputVal}</p>
            </div>
        </>
    )
}

export default MyApplic;
