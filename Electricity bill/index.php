<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Bill Calculator</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        header {
            text-align: center;
            margin-bottom: 20px;
        }
        h1 {
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #f0f0f0;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
            color: #333;
        }
        caption {
            margin-bottom: 10px;
            font-weight: bold;
        }
        footer {
            text-align: center;
            margin-top: 30px;
            color: #666;
        }
    </style>
</head>
<body>
    <header>
        <h1>Electricity Bill Calculator</h1>
    </header>

    <div class="container">
        <div class="form-group">
            <label for="units">Enter Units Consumed:</label>
            <input type="number" id="units" class="form-control" placeholder="Enter units">
        </div>
        <button id="calculate-btn" class="btn">Calculate</button>
        <div id="bill-amount" class="result"></div>

        <table>
            <caption>Rate per Unit</caption>
            <thead>
                <tr>
                    <th>Units</th>
                    <th>Rate (Rs.)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>First 50 units</td>
                    <td>3.50</td>
                </tr>
                <tr>
                    <td>Next 100 units</td>
                    <td>4.00</td>
                </tr>
                <tr>
                    <td>Next 100 units</td>
                    <td>5.20</td>
                </tr>
                <tr>
                    <td>Units above 250</td>
                    <td>6.50</td>
                </tr>
            </tbody>
        </table>
    </div>

    <footer>
        <p>&copy; 2024 Electricity Bill Calculator</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#calculate-btn').click(function() {
                var units = $('#units').val();
                $.ajax({
                    url: 'cal.php',
                    type: 'GET',
                    data: { units: units },
                    success: function(response) {
                        var billAmount = JSON.parse(response).billAmount;
                        $('#bill-amount').html('Your Electricity Bill Amount: Rs. ' + billAmount);
                    }
                });
            });
        });
    </script>
</body>
</html>
