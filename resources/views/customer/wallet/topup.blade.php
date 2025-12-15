<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Up Balance</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="max-w-lg mx-auto mt-16 bg-white shadow-lg rounded-2xl p-8">

        <h1 class="text-2xl font-bold mb-6 text-center">Top Up Balance</h1>

        <form action="#" method="POST">
            @csrf

            <label class="block mb-2 font-medium">Amount</label>
            <input 
                type="number" 
                name="amount" 
                class="w-full mb-4 border rounded-lg p-3 focus:ring focus:ring-green-200"
                placeholder="Enter amount..."
                required
            >

            <label class="block mb-2 font-medium">Payment Method</label>
            <select 
                name="method"
                class="w-full mb-6 border rounded-lg p-3 focus:ring focus:ring-green-200"
                required
            >
                <option value="">-- Choose Payment Method --</option>
                <option value="bank">Bank Transfer</option>
                <option value="ewallet">E-Wallet (Dana, Gopay, Ovo)</option>
                <option value="va">Virtual Account</option>
            </select>

            <button 
                type="submit"
                class="w-full bg-[#8BAE8E] text-white py-3 rounded-lg hover:opacity-90 transition"
            >
                Top Up Now
            </button>
        </form>

        <p class="text-center text-sm mt-5 text-gray-500">
            Your balance will update automatically after confirmation.
        </p>
    </div>

</body>
</html>