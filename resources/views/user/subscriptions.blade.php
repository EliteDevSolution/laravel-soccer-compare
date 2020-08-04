@extends('layouts.user')
@section('styles')
    <link href="{{ asset('user_assets/libs/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />

    <style>
        .switchery {
            width: 90px;
        }
    </style>
@endsection
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <h4 class="page-title">Plans</h4>
        </div>
    </div>
</div>
@if(isset($trial_version_msg) && $trial_version_msg != "")
    <div class="alert alert-info col-md-8 offset-2" role="alert">
        <i class="mdi mdi-alert-circle-outline mr-2"></i> {{ $trial_version_msg }}
    </div>
@endif
@if(isset($success))
    <div class="alert alert-success" role="alert">
        <i class="mdi mdi-check-all mr-2"></i> {{ $success }}
    </div>
@elseif(isset($fail))
    <div class="alert alert-danger" role="alert">
        <i class="mdi mdi-block-helper mr-2"></i> {{ $fail }}
    </div>
@endif
<!-- Plans -->
<div class="row mb-3">
    <div class="col-md-6 offset-3 text-center">
        <input type="checkbox" data-plugin="switchery" data-color="#1bb99a" data-secondary-color="#1C8AB9" />
{{--        <ul class="nav nav-pills navtab-bg nav-justified">--}}
{{--            <li class="nav-item">--}}
{{--                <a href="#monthly" id="monthly_tag" data-toggle="tab" aria-expanded="true" class="nav-link active" onclick="selectType()">--}}
{{--                    Monthly--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a href="#yearly" id="yearly_tag" data-toggle="tab" aria-expanded="false" class="nav-link" onclick="selectType()">--}}
{{--                    Yearly--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}
    </div>
</div>
@php
    $user = \Illuminate\Support\Facades\Auth::user();
    $plan_id = \App\Models\User\SubscribePlan::query()->where("plan_id", $user->plan_id)->get()[0]->id ?? 0;
@endphp
<div class="row" id="yearly">
    <div class="col-md-3 offset-3">
        <div class="card card-pricing">
            <div class="card-body text-center">
                <p class="card-pricing-plan-name font-weight-bold text-uppercase pb-0">Basic Plan</p>
                <h2 class="card-pricing-price pt-0 mb-0"><sup>€</sup>&nbsp;220 <span>/ Year</span></h2>
                <ul class="card-pricing-features pt-0 pb-0">
                    <li>Scout young players and academies</li>
                </ul>
                <ul class="card-pricing-features pt-0">
                    <li>Free Trial</li>
                    <li>(save 20 €)</li>
                </ul>
                @if($user->is_subscribed == 1)
                    @if($plan_id == 3)
{{--                        <a href="{{ url('/subscribe/paypal/cancel/3') }}" class="btn btn-danger btn-block waves-effect waves-light mt-1 mb-2 width-sm">Cancel</a>--}}
                        <button class="btn btn-primary btn-block mt-1 mb-2 width-sm" disabled="">Selected</button>
                    @else
                        <button class="btn btn-primary btn-block mt-1 mb-2 width-sm" disabled="">Other Plan Selected</button>
                    @endif
                @else
                    <a href="{{ url('/subscribe/paypal/3') }}" class="btn btn-primary btn-block waves-effect waves-light mt-1 mb-2 width-sm">Select</a>
                @endif
                <div class="dropdown-divider"></div>
                <ul class="card-pricing-features">
                    <li>Add and follow your own players</li>
                    <li>Create new teams and tournaments</li>
                    <li>Create and export PDF reports</li>
                    <li>Find your players with smart filters</li>
                </ul>
            </div>
        </div> <!-- end Pricing_card -->
    </div> <!-- end col -->

    <div class="col-md-3">
        <div class="card card-pricing card-pricing-recommended">
            <div class="card-body text-center">
                <p class="card-pricing-plan-name font-weight-bold text-uppercase pb-0">Plan Pro</p>
                <img src="{{ asset('user_assets/images/pro_logo.png') }}" width="100px" height="40px" style="top: 13px; right: 5px; position: absolute;" />
                <h2 class="card-pricing-price pt-0 mb-0"><sup>€</sup>&nbsp;290 <span>/ Year</span></h2>
                <ul class="card-pricing-features pt-0 pb-0">
                    <li>Scout young and professional players</li>
                </ul>
                <ul class="card-pricing-features pt-0">
                    <li>Free Trial</li>
                    <li>(save 70 €)</li>
                </ul>
                @if($user->is_subscribed == 1)
                    @if($plan_id == 4)
{{--                        <a href="{{ url('/subscribe/paypal/cancel/4') }}" class="btn btn-danger btn-block waves-effect waves-light mt-1 mb-2 width-sm">Cancel</a>--}}
                        <button class="btn btn-light btn-block mt-1 mb-2 width-sm" disabled="">Selected</button>
                    @else
                        <button class="btn btn-light btn-block mt-1 mb-2 width-sm" disabled="">Other Plan Selected</button>
                    @endif
                @else
                    <a href="{{ url('/subscribe/paypal/4') }}" class="btn btn-light btn-block waves-effect waves-light mt-1 mb-2 width-sm">Select</a>
                @endif
                <div class="dropdown-divider"></div>
                <ul class="card-pricing-features">
                    <li>Add and follow your own players + pre-loaded players</li>
                    <li>Create new teams and tournaments</li>
                    <li>Create and export PDF reports</li>
                    <li>Find your players with smart filters</li>
                    <li>+250 competitions, +170000 players, +75 teams</li>
                    <li>Compare players</li>
                    <li>Add more users or collaborators</li>
                </ul>
            </div>
        </div> <!-- end Pricing_card -->
    </div> <!-- end col -->
</div>
<!-- end row -->
<div class="row" id="monthly">
    <div class="col-md-3 offset-3">
        <div class="card card-pricing">
            <div class="card-body text-center">
                <p class="card-pricing-plan-name font-weight-bold text-uppercase pb-0">Basic Plan</p>
                <h2 class="card-pricing-price pt-0 mb-0"><sup>€</sup>&nbsp;20 <span>/ Month</span></h2>
                <ul class="card-pricing-features pt-0 pb-0">
                    <li>Scout young players and academies</li>
                </ul>
                <ul class="card-pricing-features pt-0">
                    <li>Free Trial</li>
                    <li>(240 € per year)</li>
                </ul>
                @if($user->is_subscribed == 1)
                    @if($plan_id == 1)
{{--                        <a href="{{ url('/subscribe/paypal/cancel/1') }}" class="btn btn-danger btn-block waves-effect waves-light mt-1 mb-2 width-sm">Cancel</a>--}}
                        <button class="btn btn-primary btn-block mt-1 mb-2 width-sm" disabled="">Selected</button>
                    @else
                        <button class="btn btn-primary btn-block mt-1 mb-2 width-sm" disabled="">Other Plan Selected</button>
                    @endif
                @else
                    <a href="{{ url('/subscribe/paypal/1') }}" class="btn btn-primary btn-block waves-effect waves-light mt-1 mb-2 width-sm">Select</a>
                @endif
                <div class="dropdown-divider"></div>
                <ul class="card-pricing-features">
                    <li>Add and follow your own players</li>
                    <li>Create new teams and tournaments</li>
                    <li>Create and export PDF reports</li>
                    <li>Find your players with smart filters</li>
                </ul>
            </div>
        </div> <!-- end Pricing_card -->
    </div> <!-- end col -->

    <div class="col-md-3">
        <div class="card card-pricing card-pricing-recommended">
            <div class="card-body text-center">
                <p class="card-pricing-plan-name font-weight-bold text-uppercase pb-0">Plan Pro</p>
                <img src="{{ asset('user_assets/images/pro_logo.png') }}" width="100px" height="40px" style="top: 13px; right: 5px; position: absolute;" />
                <h2 class="card-pricing-price pt-0 mb-0"><sup>€</sup>&nbsp;30 <span>/ Month</span></h2>
                <ul class="card-pricing-features pt-0 pb-0">
                    <li>Scout young and professional players</li>
                </ul>
                <ul class="card-pricing-features pt-0">
                    <li>Free Trial</li>
                    <li>(360 € per year)</li>
                </ul>
                @if($user->is_subscribed == 1)
                    @if($plan_id == 2)
{{--                        <a href="{{ url('/subscribe/paypal/cancel/2') }}" class="btn btn-danger btn-block waves-effect waves-light mt-1 mb-2 width-sm">Cancel</a>--}}
                        <button class="btn btn-light btn-block mt-1 mb-2 width-sm" disabled="">Selected</button>
                    @else
                        <button class="btn btn-light btn-block mt-1 mb-2 width-sm" disabled="">Other Plan Selected</button>
                    @endif
                @else
                    <a href="{{ url('/subscribe/paypal/2') }}" class="btn btn-light btn-block waves-effect waves-light mt-1 mb-2 width-sm">Select</a>
                @endif
                <div class="dropdown-divider"></div>
                <ul class="card-pricing-features">
                    <li>Add and follow your own players + pre-loaded players</li>
                    <li>Create new teams and tournaments</li>
                    <li>Create and export PDF reports</li>
                    <li>Find your players with smart filters</li>
                    <li>+250 competitions, +170000 players, +75 teams</li>
                    <li>Compare players</li>
                    <li>Add more users or collaborators</li>
                </ul>
            </div>
        </div> <!-- end Pricing_card -->
    </div> <!-- end col -->
</div>
<!-- end row -->
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('user_assets/libs/switchery/switchery.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(".card-pricing").css("height", $(".card-pricing-recommended").css("height"));
            // selectType();
            $('[data-plugin="switchery"]').each(function (e, n) {
                new Switchery($(this)[0], $(this).data())
            }).change(function() {
                if (this.checked)
                {
                    $("#yearly").css("display", "");
                    $("#monthly").css("display", "none");
                } else {
                    $("#yearly").css("display", "none");
                    $("#monthly").css("display", "");
                }
            });
            $("#yearly").css("display", "none");
            $("#monthly").css("display", "");
        });
        function selectType() {
            setTimeout(function () {
                if($("#yearly_tag").hasClass("active"))
                {
                    $("#yearly").css("display", "");
                    $("#monthly").css("display", "none");
                } else {
                    $("#yearly").css("display", "none");
                    $("#monthly").css("display", "");
                }
            }, 100);
        }
    </script>
@endsection