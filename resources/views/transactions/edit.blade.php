<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold text-dark">
            {{ __('Edit Transaction') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">

                    <h5 class="card-title mb-4 fw-semibold">
                        <i class="bi bi-pencil-square me-2 text-primary"></i> Update Transaction
                    </h5>

                    <form action="{{ route('transactions.update', $transaction) }}" method="POST" class="row g-3">
                        @csrf
                        @method('PUT')

                        <!-- Transaction Type -->
                        <div class="col-md-6">
                            <label for="type" class="form-label">Transaction Type</label>
                            <div class="col-md-6">
                                <select name="type" id="type" class="form-select form-select-lg rounded-3"
                                    required>
                                    <option value="" disabled {{ !$transaction->type ? 'selected' : '' }}>--
                                        Select type --</option>
                                    <option value="Catering" {{ $transaction->type === 'Catering' ? 'selected' : '' }}>
                                        Catering</option>
                                    <option value="Cake Making"
                                        {{ $transaction->type === 'Cake Making' ? 'selected' : '' }}>Cake Making
                                    </option>
                                    <option value="Equipment Rental"
                                        {{ $transaction->type === 'Equipment Rental' ? 'selected' : '' }}>Equipment
                                        Rental</option>
                                </select>
                            </div>

                        </div>

                        <!-- Amount -->
                        <div class="col-md-6">
                            <label for="amount" class="form-label">Amount (KSHs)</label>
                            <input type="number" name="amount" id="amount" class="form-control"
                                value="{{ $transaction->amount }}" required min="0" step="0.01">
                        </div>

                        <!-- Action Buttons -->
                        <div class="col-12 d-flex justify-content-end mt-4">
                            <a href="{{ route('transactions.index') }}" class="btn btn-outline-secondary me-2">
                                <i class="bi bi-x-circle"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Update Transaction
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
