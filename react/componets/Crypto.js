import React, { useState } from 'react';
import './y.css';

function InputForm() {
  const [inputValue, setInputValue] = useState(0);
  const [outputValue, setOutputValue] = useState(0);

  const handleInputChange = (event) => {
    setInputValue(event.target.value);
  };

  const handleSubmit = (event) => {
    event.preventDefault();

    // Convert the input value from rupees to dollars
    const dollarValue = inputValue / 75;

    // Set the output value
    setOutputValue(dollarValue);

    // Reset the input value
    setInputValue(0);
  };

  return (
    <div className='myapp'>
      <form onSubmit={handleSubmit} className='myform'>
        <input
          type="number"
          className='myinput'
          
          value={inputValue}
          onChange={handleInputChange}
        />
        <br/>
        <button type="submit">Convert</button>
      </form>
      <center>
      <p className='myresult'>
        Output: {outputValue} USD
       
      </p>
      </center>
    </div>
  );
}

export default InputForm;