@extends('layouts.admin')

@section('page-title')
    {{ __("Manage Bank") }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __("Home") }}</a></li>
    <li class="breadcrumb-item">{{ __("Bank") }}</li>
@endsection

@section('action-button')
    @can('Create Branch')
        <a href="#" data-url="{{ route('bank.create') }}" data-ajax-popup="true"
           data-title="{{ __('Create New Bank') }}" data-bs-toggle="tooltip" title="" class="btn btn-sm btn-primary"
           data-bs-original-title="{{ __('Create') }}">
            <i class="ti ti-plus"></i>
        </a>
    @endcan
@endsection

@section('content')
    <div class="row">
        <div class="col-3">
            @include('layouts.hrm_setup')
        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-body table-border-style">

                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th>{{__('Bank')}}</th>
                                <th width="200px">{{__('Action')}}</th>
                            </tr>
                            </thead>
                            <tbody >
                            @foreach ($aBanks as $bank)
                                <tr>
                                    <td>{{ $bank->name }}</td>
                                    <td class="Action">
                                        <span>
                                            @can('Edit Branch')
                                                <div class="action-btn bg-info ms-2">
                                                    <a href="#" class="mx-3 btn btn-sm  align-items-center"
                                                       data-url="{{ URL::to('bank/' . $bank->id . '/edit') }}"
                                                       data-ajax-popup="true" data-size="md" data-bs-toggle="tooltip" title=""
                                                       data-title="{{ __('Edit Bank') }}"
                                                       data-bs-original-title="{{ __('Edit') }}">
                                                        <i class="ti ti-pencil text-white"></i>
                                                    </a>
                                                </div>
                                            @endcan

                                            @can('Delete Branch')
                                                <div class="action-btn bg-danger ms-2">
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['bank.destroy', $bank->id], 'id' => 'delete-form-' . $bank->id]) !!}
                                                    <a href="#" class="mx-3 btn btn-sm  align-items-center bs-pass-para"
                                                       data-bs-toggle="tooltip" title="" data-bs-original-title="Delete"
                                                       aria-label="Delete"><i
                                                            class="ti ti-trash text-white text-white"></i></a>
                                                    </form>
                                                </div>
                                            @endcan
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
