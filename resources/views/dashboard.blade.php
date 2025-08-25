<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="card bg-white shadow-sm rounded">
                <div class="card-body">

                    <div class="row g-4 justify-content-center">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card text-white shadow-lg"
                                style="background: linear-gradient(to right, #3b82f6, #ec04ba);">
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-semibold">Total Transactions</h5>
                                    <p class="display-6 fw-bold mb-0">{{ $transactions->count() }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card text-white shadow-lg"
                                style="background: linear-gradient(to right, #22c55e, #09f3d8);">
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-semibold">Total Amount</h5>
                                    <p class="display-6 fw-bold mb-0">{{ $totalAmount }}</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="row g-4 justify-content-center">

                <div class="footer">
                    <div class="row g-4 mt-4">
                        <div class="col-12 col-md-6 col-lg-4">
                            <a href="{{ route('transactions.create') }}" class="btn btn-primary w-100">Add
                                Transaction</a>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <a href="{{ route('transactions.index') }}" class="btn btn-secondary w-100">View All
                                Transactions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
