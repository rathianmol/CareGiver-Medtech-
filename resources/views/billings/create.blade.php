@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="list-style: none">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card mb-3">
                    <div class="card-header">
                        <h4>Create Billing</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('billing.store', $patient) }}">
                            @csrf
                                <div class="mb-3 form-group">
                                    <label>Case Description</label>
                                    {{-- <textarea class="form-control" name="service_description" rows="3">{{ old('service_description') }}</textarea> --}}
                                    <p>{{$patient->case_description}}</p>
                                    <label>Care Provider</label>
                                    <p>{{$patient->providers()->first()->first_name.' '.$patient->providers()->first()->last_name}}</p>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="current_illnesses">Service Description</label>
                                    <textarea class="form-control" name="service_description" rows="3">{{ old('service_description') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="total_charge" class="form-label">Total Charge</label>
                                    <input type="number" step="0.01" class="form-control" name="total_charge" id="total_charge" value="{{old('total_charge')}}">
                                </div>
                                <div class="mb-3">
                                    <label for="total_adjustment" class="form-label">Total Adjustment</label>
                                    <input type="number" step="0.01" class="form-control" name="total_adjustment" id="total_adjustment" value="{{old('total_adjustment')}}">
                                </div>
                                <div class="mb-3">
                                    <label for="total_payment" class="form-label">Total Payment</label>
                                    <input type="number" step="0.01" class="form-control" name="total_payment" id="total_payment" value="{{old('total_payment')}}">
                                </div>
                                <div class="mb-3">
                                    <label for="account_balance" class="form-label">Account Balance</label>
                                    <input type="number" step="0.01" class="form-control" name="account_balance" id="account_balance" onclick="calculateBalance()" value="{{old('account_balance')}}">
                                </div>
                                <div class="mb-3">
                                    <label for="due_date" class="form-label">Due Date</label>
                                    <input type="date" class="form-control" name="due_date" value="{{old('due_date')}}">
                                </div>
                                <button type="submit" class="btn btn-primary mb-3">Complete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function calculateBalance() {
            var totalCharge = document.getElementById("total_charge");
            var totalAdjustment = document.getElementById("total_adjustment");
            var totalPayment = document.getElementById("total_payment");
            var accountBalance = document.getElementById("account_balance");
            var accountBalanceValue = parseFloat(totalCharge.value) - (parseFloat(totalAdjustment.value) + parseFloat(totalPayment.value));
            accountBalance.value = accountBalanceValue;
        }
    </script>
@endsection
