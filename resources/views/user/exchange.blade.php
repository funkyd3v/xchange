@extends('layouts.master')
@section('title')
    Exchange your currency
@endsection

@section('content')
<div class="bg-gray-200 text-black shadow-lg rounded-lg mx-auto p-6 w-full max-w-md">
    <h2 class="text-2xl font-bold mb-4 text-center">Currency Exchange</h2>
    <form method="POST" action="{{ route('user.exchange') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="send-currency" class="block text-sm font-medium text-gray-700">Send</label>
            <select id="send-currency" name="send_currency" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option selected>Select a currency</option>
                @foreach ($currencies as $currency)
                <option value="{{ $currency->id }}">{{ $currency->name }}
                </option>  
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="receive-currency" class="block text-sm font-medium text-gray-700">Receive</label>
            <select id="receive-currency" name="receive_currency" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option selected>Select a currency</option>
                @foreach ($currencies as $currency)
                <option value="{{ $currency->id }}">{{ $currency->name }}</option>  
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="currency-amount" class="block text-sm font-medium text-gray-700">Receive Currency Amount</label>
            <input type="number" id="currency-amount" name="send_currency_amount" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter amount">
            <div id="pay-amount" class="text-green-600 text-sm hidden"></div>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Upload Transfer Screenshot</label>
            <div id="file-upload-area" class="relative border-4 border-dashed border-gray-200 rounded-lg p-4 hover:border-gray-300 transition duration-200">
                <input id="file-input" type="file" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" multiple>
                <div class="flex flex-col items-center justify-center h-full pointer-events-none">
                    <svg class="w-12 h-12 text-gray-400 mb-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.88 8.31a7.87 7.87 0 01.38 10.38 8.12 8.12 0 01-10.76.38A7.88 7.88 0 011.61 8.7 8.12 8.12 0 018.69 1.62a7.88 7.88 0 018.19 6.69zM8.69 6.31a1.31 1.31 0 100 2.62 1.31 1.31 0 000-2.62z"></path>
                        <path d="M10 10.59V7.75a.75.75 0 00-1.5 0v2.84a.75.75 0 001.5 0zM10 12a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                    </svg>
                    <p class="text-gray-600">Drag and drop your files here or click to browse</p>
                </div>
            </div>
            <div id="preview-area" class="mt-4 grid grid-cols-2 gap-4"></div>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Exchange
            </button>
            <a href="{{ route('contact') }}" class="inline-block align-baseline font-bold text-sm text-indigo-600 hover:text-indigo-800">
                Need help?
            </a>
        </div>
    </form>
</div>
@endsection

@section('custom-js')
<script>
    // currency amount
    document.getElementById('receive-currency').addEventListener('change', function() {
        var selectedCurrency = this.value;
    
        fetch(`/currency-rate?id=${selectedCurrency}`)
            .then(response => response.json())
            .then(data => {
                if (data) {
                    console.log('Currency Rate:', data.sale_rate);
                    console.log('Currency dollar:', data.dollar);
                    updatePayAmount(data);
                } else {
                    console.error('Error:', data.error);
                    document.getElementById('pay-amount').textContent = 'Currency not found';
                    document.getElementById('pay-amount').classList.remove('hidden');
                }
            })
            .catch(error => {
                console.error('Error fetching currency rate:', error);
                document.getElementById('pay-amount').textContent = 'Error fetching currency rate';
                document.getElementById('pay-amount').classList.remove('hidden');
            });
    });
    
    function updatePayAmount(data) {
        const amount = parseFloat(document.getElementById('currency-amount').value);
        const payAmountElement = document.getElementById('pay-amount');
        if (amount > 0) {
            if (data.dollar == '1') {
                const payAmount = amount * data.buy_rate;
                payAmountElement.textContent = `You have tp pay: ${payAmount.toFixed(2)} BDT`;
            }else{
                const payAmount = amount * data.sale_rate;
                payAmountElement.textContent = `You will receive: ${payAmount.toFixed(2)} BDT` ;
            }
            payAmountElement.classList.remove('hidden');
        } else {
            payAmountElement.classList.add('hidden');
    }

    document.getElementById('currency-amount').addEventListener('input', function() {
    const receiveCurrency = document.getElementById('receive-currency').value;
    if (receiveCurrency) {
        fetch(`/currency-rate?id=${receiveCurrency}`)
            .then(response => response.json())
            .then(data => {
                if (data) {
                    updatePayAmount(data);
                }
            });
    }
});

document.getElementById('send-currency').addEventListener('change', function() {
    const receiveCurrency = document.getElementById('receive-currency').value;
    if (receiveCurrency) {
        fetch(`/currency-rate?id=${receiveCurrency}`)
            .then(response => response.json())
            .then(data => {
                if (data) {
                    updatePayAmount(data);
                }
            });
    }
});

document.getElementById('receive-currency').addEventListener('change', function() {
    const receiveCurrency = this.value;
    const amount = parseFloat(document.getElementById('currency-amount').value);
    if (receiveCurrency && amount) {
        fetch(`/currency-rate?id=${receiveCurrency}`)
            .then(response => response.json())
            .then(data => {
                if (data) {
                    updatePayAmount(data);
                }
            });
    }
});
}
</script>
<script>
    const fileInput = document.getElementById('file-input');
    const fileUploadArea = document.getElementById('file-upload-area');
    const previewArea = document.getElementById('preview-area');

    fileInput.addEventListener('change', handleFiles);

    fileUploadArea.addEventListener('dragover', (event) => {
        event.preventDefault();
        fileUploadArea.classList.add('border-indigo-500');
    });

    fileUploadArea.addEventListener('dragleave', () => {
        fileUploadArea.classList.remove('border-indigo-500');
    });

    fileUploadArea.addEventListener('drop', (event) => {
        event.preventDefault();
        fileUploadArea.classList.remove('border-indigo-500');
        const files = event.dataTransfer.files;
        handleFiles({ target: { files } });
    });

    function handleFiles(event) {
        const files = event.target.files;
        previewArea.innerHTML = '';
        for (const file of files) {
            if (!file.type.startsWith('image/')) continue;

            const reader = new FileReader();
            reader.onload = (e) => {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('w-full', 'h-auto', 'object-cover', 'rounded-md', 'shadow-md');
                previewArea.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    }
    
</script>

{{-- <script>
    document.getElementById('receive-currency').addEventListener('change', function() {
        var selectedCurrency = this.value;
    
        fetch(`/currency-rate?id=${selectedCurrency}`)
            .then(response => response.json())
            .then(data => {
                if (data.sale_rate) {
                    console.log('Currency Rate:', data.sale_rate);
                    updatePayAmount(data.sale_rate);
                } else {
                    console.error('Error:', data.error);
                    document.getElementById('pay-amount').textContent = 'Currency not found';
                    document.getElementById('pay-amount').classList.remove('hidden');
                }
            })
            .catch(error => {
                console.error('Error fetching currency rate:', error);
                document.getElementById('pay-amount').textContent = 'Error fetching currency rate';
                document.getElementById('pay-amount').classList.remove('hidden');
            });
    });
</script> --}}
@endsection