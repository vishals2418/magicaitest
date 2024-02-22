@extends('panel.layout.app')
@section('title', 'Adsense Management')

@section('additional_css')
    <link rel="stylesheet" href="/assets/css/panel/adsense.css">
    <link href="/assets/plugins/datatable/datatables.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="page-header">
        <div class="container-xl">
            <div class="row g-2 items-center">
                <div class="col">
                    <a href="{{ LaravelLocalization::localizeUrl(route('dashboard.index')) }}"
                        class="page-pretitle flex items-center">
                        <svg class="!me-2 rtl:-scale-x-100" width="8" height="10" viewBox="0 0 6 10"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.45536 9.45539C4.52679 9.45539 4.60714 9.41968 4.66071 9.36611L5.10714 8.91968C5.16071 8.86611 5.19643 8.78575 5.19643 8.71432C5.19643 8.64289 5.16071 8.56254 5.10714 8.50896L1.59821 5.00004L5.10714 1.49111C5.16071 1.43753 5.19643 1.35718 5.19643 1.28575C5.19643 1.20539 5.16071 1.13396 5.10714 1.08039L4.66071 0.633963C4.60714 0.580392 4.52679 0.544678 4.45536 0.544678C4.38393 0.544678 4.30357 0.580392 4.25 0.633963L0.0892856 4.79468C0.0357141 4.84825 0 4.92861 0 5.00004C0 5.07146 0.0357141 5.15182 0.0892856 5.20539L4.25 9.36611C4.30357 9.41968 4.38393 9.45539 4.45536 9.45539Z" />
                        </svg>
                        {{ __('Back to Google Adsense') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body pt-6">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card border-0">
                        <div class="card-header">
                            <h3 class="card-title">Google Adsense List <span class="inline-block relative">
                                    <span class="inline-flex items-center justify-center !w-6 !h-6 -mt-6 relative peer">
                                        <svg class="fill-[#D8DBE5]" width="14" height="14" viewBox="0 0 14 14"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.66732 0.333313C10.3473 0.333313 13.334 3.31998 13.334 6.99998C13.334 10.68 10.3473 13.6666 6.66732 13.6666C2.98732 13.6666 0.000652313 10.68 0.000652313 6.99998C0.000652313 3.31998 2.98732 0.333313 6.66732 0.333313ZM6.00065 10.3333H7.33398V6.33331H6.00065V10.3333ZM6.00065 4.99998H7.33398V3.66665H6.00065V4.99998Z">
                                            </path>
                                        </svg>
                                    </span>
                                    <div
                                        class="absolute bottom-[calc(100%+0.75rem)] !start-0 min-w-[230px] !p-3 bg-[#fff] bg-opacity-5 text-[13px] font-medium tex-heading rounded-md backdrop-blur-md backdrop-saturate-150 duration-300 border border-solid !border-black !border-opacity-10 !opacity-0 -translate-y-2 transition-all shadow-[0_4px_15px_rgba(0,0,0,0.05)] pointer-events-none peer-hover:!opacity-100 peer-hover:translate-y-0">
                                        Activate header section to view ads</div>
                                </span></h3>
                        </div>
                        <div class="card-body pt-2">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="adsTable" class="table dataTable no-footer dtr-inline" width="100%"
                                        role="grid" aria-describedby="adsTable_info" style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th width="20%">
                                                    Adsense Type</th>
                                                <th width="20%">Status</th>
                                                <th width="20%">Updated
                                                    On</th>
                                                <th width="5%">Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="card">
                <div id="table-default" class="card-table table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><button class="table-sort" data-sort="sort-name">{{ __('Adsense Type') }}</button>
                                </th>
                                <th><button class="table-sort" data-sort="sort-status">{{ __('Status') }}</button></th>
                                <th><button class="table-sort" data-sort="sort-date">{{ __('Updated On') }}</button></th>
                                <th class="!text-end">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="table-tbody align-middle text-heading">

                            @foreach ($adsenses as $entry)
                                <tr>
                                    <td class="sort-type"><span class="font-weight-bold">{{ $entry->type }}</span></td>
                                    <td class="sort-status">
                                        @if ($entry->status == 1)
                                            <div class="badge bg-success">Active</div>
                                        @else
                                            <span class="badge bg-danger">Deactivated</span>
                                        @endif
                                    </td>
                                    <td class="sort-date" data-date="{{ strtotime($entry->updated_at) }}">
                                        <span>{{ date('d M Y h:i A', strtotime($entry->updated_at)) }}</span>
                                    </td>
                                    <td class="!text-end whitespace-nowrap">
                                        <a href="{{ route('dashboard.admin.adsense.edit', $entry->id) }}"
                                            class="btn w-[36px] h-[36px] p-0 border hover:bg-[var(--tblr-primary)] hover:text-white"
                                            title="{{ __('Edit') }}">
                                            <svg width="13" height="12" viewBox="0 0 15 14" fill="none"
                                                stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.71875 2.43988L11.9688 5.58995M10.75 11.4963H14M4.25 13.0714L12.7812 4.80248C12.9946 4.59564 13.1639 4.35009 13.2794 4.07984C13.3949 3.8096 13.4543 3.51995 13.4543 3.22744C13.4543 2.93493 13.3949 2.64528 13.2794 2.37504C13.1639 2.10479 12.9946 1.85924 12.7812 1.6524C12.5679 1.44557 12.3145 1.28149 12.0357 1.16955C11.7569 1.05761 11.458 1 11.1562 1C10.8545 1 10.5556 1.05761 10.2768 1.16955C9.99799 1.28149 9.74465 1.44557 9.53125 1.6524L1 9.92135V13.0714H4.25Z"
                                                    stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                    <div
                        class="flex items-center border-solid border-t border-r-0 border-b-0 border-l-0 border-[--tblr-border-color] px-[--tblr-card-cap-padding-x] py-[--tblr-card-cap-padding-y] [&_.rounded-md]:rounded-full">
                        <ul class="pagination m-0 ms-auto p-0"></ul>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
@section('script')
    <script src="/assets/plugins/datatable/datatables.min.js"></script>
    <script type="text/javascript">
        $(function() {
            "use strict";
            var table = $('#adsTable').DataTable({
                bProcessing: true,
                bServerSide: true,
                processing: true,
                serverSide: true,
                searching: true,
                responsive: false,
                ajax: {
                    url: "{{ route('dashboard.admin.adsense.list') }}?datatable=yes"
                },
                columns: [{
                        data: 'type',
                        orderable: true
                    },
                    {
                        data: 'status',
                        orderable: true
                    },
                    {
                        data: 'updated_at',
                        orderable: true
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }
                ]
            });
        });
    </script>
@endsection
