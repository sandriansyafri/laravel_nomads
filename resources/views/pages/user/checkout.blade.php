@extends('layouts.app-checkout')

@section('title','Checkout')

@push('css')
<link rel="stylesheet" href="{{ asset('frontend') }}/libraries/gijgo/css/gijgo.min.css" />
@endpush

@section('content')
<main>
  <section class="section-details-header"></section>
  <section class="section-details-content">
    <div class="container">
      <div class="row">
        <div class="col p-0 pl-3 pl-lg-0">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item" aria-current="page">
                Paket Travel
              </li>
              <li class="breadcrumb-item" aria-current="page">
                Details
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Checkout
              </li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 pl-lg-0">
          <div class="card card-details mb-3">
            <h1>Who is Going?</h1>
            <p>
              Trip to {{ $transaction->travel_package->title }}, {{ $transaction->travel_package->location }}
            </p>
            <div class="attendee">
              <table class="table table-responsive-sm text-center">
                <thead>
                  <tr>
                    <td scope="col">Picture</td>
                    <td scope="col">Name</td>
                    <td scope="col">Nationality</td>
                    <td scope="col">Visa</td>
                    <td scope="col">Passport</td>
                    <td scope="col"></td>
                  </tr>
                </thead>
                <tbody>
                 @foreach ($transaction->transaction_detail as $transaction_detail)
                 <tr>
                  <td>
                    <img src="https://ui-avatars.com/api/?name={{ $transaction_detail->username }}" alt="" height="60" class="rounded-circle">
                  </td>
                  <td class="align-middle">{{ $transaction_detail->username }}</td>
                  <td class="align-middle">{{ $transaction_detail->nationality }}</td>
                  <td class="align-middle">{{ $transaction_detail->is_visa ? '30Day' : 'N/A' }}</td>
                  <td class="align-middle">
                    {{ 
                      \Carbon\Carbon::createFromDate($transaction_detail->doe_passport) > 
                      \Carbon\Carbon::now() ? 'Active' : 'In Active'
                      }}
                  </td>
                  <td class="align-middle">
                    <form action="{{ route('checkout-remove',$transaction_detail->id) }}" class="d-inline-block" method="POST">
                      @csrf
                      <button type="submit" class="btn" >
                        <img src="{{ asset('frontend') }}/images/ic_remove.png" alt="">
                      </button>
                    </form>
                  </td>
                </tr>
                 @endforeach
              
                </tbody>
              </table>
            </div>
            <div class="member mt-3">
              <h2>Add Member</h2>
              <form class="form-inline" action="{{ route('checkout-create',$transaction->id) }}" method="POST">
                @csrf
                <label class="sr-only" for="inputUsername">Name</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inputUsername" placeholder="Username" name="username">

                <label class="sr-only" for="inlineFormCustomSelectPref">Preference</label>
                <select name="is_visa" class="custom-select mb-2 mr-sm-2" id="inlineFormCustomSelectPref">
                  <option selected="" value="">VISA</option>
                  <option value="1">30 Days</option>
                  <option value="0">N/A</option>
                </select>

                <label class="sr-only" for="doePassport">DOE Passport</label>
                <div class="input-group mb-2 mr-sm-2">
                  <input name="doe_passport" id="datepicker" width="276" />
                </div>

                <button type="submit" class="btn btn-add-now mb-2 px-4">
                  Add Now
                </button>
              </form>
              <h3 class="mt-2 mb-0">Note</h3>
              <p class="disclaimer mb-0">
                You are only able to invite member that has registered in
                Nomads.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card card-details card-right">
            <h2>Checkout Information</h2>
            <table class="trip-informations">
              <tbody><tr>
                <th width="50%">Members</th>
                <td width="50%" class="text-right">{{ $transaction->transaction_detail->count() }} person</td>
              </tr>
              <tr>
                <th width="50%">Additional Visa</th>
                <td width="50%" class="text-right">$ {{ $transaction->addtional_visa }}</td>
              </tr>
              <tr>
                <th width="50%">Trip Price</th>
                @if ($transaction->transaction_detail->count())
                <td width="50%" class="text-right">$ {{ $transaction->travel_package->price }} / person</td>
                @else 
                <td width="50%" class="text-right">-</td>
              @endif
              
              </tr>
              <tr>
                <th width="50%">Sub Total</th>
                <td width="50%" class="text-right">$ {{ $transaction->transaction_total }}</td>
              </tr>
              <tr>
                <th width="50%">Total (+Unique)</th>
                <td width="50%" class="text-right text-total">
                  <span class="text-blue">$ {{ $transaction->transaction_total }}</span>
                  <span class="text-orange">
                    @if ($transaction->transaction_detail->count())
                      , {{ mt_rand(0,99) }}
                    @endif
                  </span>
                </td>
              </tr>
            </tbody></table>

            <hr>
            <h2>Payment Instructions</h2>
            <p class="payment-instructions">
              Please complete your payment before to continue the wonderful
              trip
            </p>
            <div class="bank">
              <div class="bank-item pb-3">
                <img src="{{ asset('frontend') }}/images/ic_bank.png" alt="" class="bank-image">
                <div class="description">
                  <h3>PT Nomads ID</h3>
                  <p>
                    0881 8829 8800
                    <br>
                    Bank Central Asia
                  </p>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="bank-item">
                <img src="{{ asset('frontend') }}/images/ic_bank.png" alt="" class="bank-image">
                <div class="description">
                  <h3>PT Nomads ID</h3>
                  <p>
                    0899 8501 7888
                    <br>
                    Bank HSBC
                  </p>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <div class="join-container">
            <form action="{{ route('checkout-success',$transaction->id) }}" method="post">
              @csrf
              <button type="submit" class="btn btn-block btn-join-now mt-3 py-2">I Have Made Payment</button>
            </form>
          </div>
          <div class="text-center mt-3">
            <form action="{{ route('checkout-failed',$transaction->id) }}" method="post">
              @csrf
            <button type="submit"  class="btn text-muted">Cancel Booking</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

@push('js')
<script src="{{ asset('frontend') }}/libraries/gijgo/js/gijgo.min.js"></script>

<script>
  $(document).ready(function() {
    $('#datepicker').datepicker({
      uiLibrary: 'bootstrap4',
      icons: {
        rightIcon: '<img src="{{ asset('frontend') }}/images/ic_doe.png" alt="" />'
      }
    });
  });
</script>
@endpush