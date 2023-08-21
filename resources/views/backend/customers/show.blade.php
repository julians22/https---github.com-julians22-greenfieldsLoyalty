@extends('backend.layouts.app')

@section('title', __('View Customer'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Customer User')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.user.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('Name')</th>
                    <td>{{ $user->name }}</td>
                </tr>

                <tr>
                    <th>@lang('Child Name')</th>
                    <td>{{ $user->child_name }}</td>
                </tr>

                <tr>
                    <th>@lang('Date Of Birth')</th>
                    <td>{{ $user->date_of_birth }}</td>
                </tr>

                <tr>
                    <th>@lang('Child Date Of Birth')</th>
                    <td>{{ $user->child_date_of_birth }}</td>
                </tr>

                <tr>
                    <th>@lang('Phone Number')</th>
                    <td>{{ $user->phone }}</td>
                </tr>

                <tr>
                    <th>@lang('E-mail Address')</th>
                    <td>{{ $user->email }}</td>
                </tr>

                <tr>
                    <th>@lang('Timezone')</th>
                    <td>{{ $user->timezone ?? __('N/A') }}</td>
                </tr>

                <tr>
                    <th>@lang('Last Login At')</th>
                    <td>
                        @if($user->last_login_at)
                            @displayDate($user->last_login_at)
                        @else
                            @lang('N/A')
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>@lang('Last Known IP Address')</th>
                    <td>{{ $user->last_login_ip ?? __('N/A') }}</td>
                </tr>

                @if ($user->isHasAddressData())
                    <tr class="bg-secondary">
                        <th colspan="2">
                            Customer Address
                        </th>
                    </tr>
                    <tr>
                        <th>@lang('Full Address')</th>
                        <td>{{ $user->address_data->address }}</td>
                    </tr>
                    @if ($user->isHasAddressData() && $user->address_data->domicile)
                        <tr>
                            <th>@lang('Domicile')</th>
                            <td>{{ ($user->isHasAddressData()) ?  $user->address_data->domicile : '-' }}</td>
                        </tr>
                    @endif
                    <tr>
                        <th>@lang('Province')</th>
                        <td>{{ ($user->address_data->hasProvince() && $user->isHasAddressData()) ?  $user->address_data->rel_province->name : '-' }}</td>
                    </tr>
                    <tr>
                        <th>@lang('City')</th>
                        <td>{{  ($user->address_data->hasCity() && $user->isHasAddressData()) ? $user->address_data->rel_city->name : '-' }}</td>
                    </tr>
                    <tr>
                        <th>@lang('Distict')</th>
                        <td>{{  ($user->address_data->hasDistrict() && $user->isHasAddressData()) ? $user->address_data->rel_district->name : '-' }}</td>
                    </tr>
                    <tr>
                        <th>@lang('Postal Code')</th>
                        <td>{{ $user->address_data->postal_code }}</td>
                    </tr>
                @endif

                @if ($user->isHasDetail())
                    <tr class="bg-secondary">
                        <th colspan="2">
                            Customer Survey
                        </th>
                    </tr>
                    <tr>
                        <th>@lang('Ketegori Susu yang diminum 3 bulan terakhir')</th>
                        <td>{{ $user->detail->history_milk_category }}</td>
                    </tr>
                    <tr>
                        <th>@lang('Brand Susu yang diminum 3 bulan terakhir')</th>
                        <td>{{ $user->detail->history_milk_product }}</td>
                    </tr>
                    <tr>
                        <th>@lang('Packsize')</th>
                        <td>{{ $user->detail->history_milk_packsize }}</td>
                    </tr>
                @endif
            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('Account Created'):</strong> @displayDate($user->created_at) ({{ $user->created_at->diffForHumans() }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($user->updated_at) ({{ $user->updated_at->diffForHumans() }})

                @if($user->trashed())
                    <strong>@lang('Account Deleted'):</strong> @displayDate($user->deleted_at) ({{ $user->deleted_at->diffForHumans() }})
                @endif
            </small>
        </x-slot>
    </x-backend.card>
@endsection
