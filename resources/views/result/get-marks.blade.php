@extends('result.include')
@section('backTitle')
Get Mark
@endsection
@section('backIndex')
<form method="POST" class="card-body form form-group" action="">
                @csrf
                <div class="mb-2">
                    <label for="source" class="form-label ">Source</label>
                    <input type="text" class="form-control form-control-sm" id="source" name="source" placeholder="" required>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="amount" class="form-label ">Amount</label>
                    <input type="number" class="form-control form-control-sm" id="amount" name="amount" placeholder="" required>
                </div>
                <div class=" col-6  d-grid gap-2 mt-5">
                    <button class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" type="submit">Submit</button>
                    <button class="btn-fill-lg bg-blue-dark btn-hover-bluedark" type="reset">Reset</button>
                </div>
            </form>
@endsection