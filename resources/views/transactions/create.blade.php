<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Transaction') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">

                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-header bg-primary text-white rounded-top-4">
                            <h5 class="mb-0">New Transaction</h5>
                        </div>

                        <div class="card-body p-4">
                            <form action="{{ route('transactions.store') }}" method="POST">
                                @csrf

                                <!-- Amount -->
                                <div class="mb-3">
                                    <label for="amount" class="form-label fw-semibold">Amount</label>
                                    <input type="number" name="amount" id="amount"
                                           class="form-control form-control-lg rounded-3"
                                           placeholder="Enter amount" step="0.01" required>
                                </div>

                                <!-- Type -->
                                <div class="mb-3">
                                    <label for="type" class="form-label fw-semibold">Type</label>
                                    <select name="type" id="type"
                                            class="form-select form-select-lg rounded-3" required>
                                        <option value="" disabled selected>-- Select type --</option>
                                        <option value="Catering">Catering</option>
                                        <option value="Cake Making">Cake Making</option>
                                        <option value="Equipment Rental">Equipment Rental</option>
                                    </select>
                                </div>

                                <!-- Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-3 shadow">
                                        <i class="bi bi-plus-circle me-2"></i> Create Transaction
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
