<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark leading-tight">
            {{ __('All Transactions') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">

                    <!-- Add Transaction Button -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0 fw-bold">Transactions List</h5>
                        <a href="{{ route('transactions.create') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-circle me-1"></i> Add Transaction
                        </a>
                    </div>

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Responsive Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->id }}</td>
                                        <td>
                                            <span class="badge
                                                @if($transaction->type === 'income') bg-success
                                                @else bg-danger
                                                @endif">
                                                {{ ucfirst($transaction->type) }}
                                            </span>
                                        </td>
                                        <td class="fw-semibold">KSHs {{ number_format($transaction->amount, 2) }}</td>
                                        <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('transactions.edit', $transaction) }}"
                                               class="btn btn-sm btn-outline-primary me-2">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            <form action="{{ route('transactions.destroy', $transaction) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this transaction?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">
                                            No transactions found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
