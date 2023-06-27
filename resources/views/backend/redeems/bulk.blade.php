@extends('backend.layouts.app')

@section('title', __('Bulk Process Redeems'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Bulk Process Redeems')
        </x-slot>

        <x-slot name="body">
            <div class="row mb-2">
                <div class="col-md-12">
                    <p class="mb-1">
                        This page are showing the redeems item by <code>ceated</code> status only.
                    </p>
                    <p class="mb-1">
                        This page allows you to synchronize exchange with bulk data from excel file. The first step is to export this table by clicking the <code>Load Data</code> button then filling in the <code>Status</code>, <code>Airwaybill</code> and <code>Delay Reason</code> Columns.
                    </p>
                    <strong>Status rules:</strong>
                    <ul>
                        <li>Status <code>send</code> means the rewards is send by you, The "<code>airwaybill_number</code>" column must be filled</li>
                        <li>Status <code>delay</code> means the rewards is on delay and you must insert the reason at the "<code>delay_reason</code>" column</li>
                    </ul>


                    <div class="alert alert-success">
                        When all the data you have created is <code><strong>correct (all fields are filled in correctly)</strong></code>, please upload the file by clicking the <code>Sync Data</code> button to continue the synchronization process
                    </div>
                </div>
                <div class="col-md-12">
                    @livewire('backend.utils.export-button-component', ['to' => 'backend.bulk-redeems-table', 'event' => 'exportRedeemsTable', 'text' => 'Load Redeems'])

                    @livewire('backend.bulk-reward-sync-component')
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <livewire:backend.bulk-redeems-table/>
                </div>
            </div>
        </x-slot>
    </x-backend.card>
@endsection
