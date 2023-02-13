<tr>
    <td>
        @if ($item->isParent())
            @foreach (config('app.locales') as $locale)
                <p>
                    <span class="badge badge-primary">{{ $locale }}</span>
                    {{ $item->getTranslation('name', $locale) }}
                </p>
            @endforeach
        @endif
    </td>
    <td>
        @if (!$item->isParent())
            @foreach (config('app.locales') as $locale)
                <p>
                    <span class="badge badge-primary">{{ $locale }}</span>
                    {{ $item->getTranslation('name', $locale) }}
                </p>
            @endforeach
        @endif
    </td>
    <td>
        {{ $item->slug }}
    </td>
    <td>
        {{ $item->order }}
    </td>
    <td class="text-center">
        <label class="switch s-primary mr-2">
            <input type="checkbox" class="toggle-active" {{ $item->status ? 'checked' : '' }}
                data-id="{{ $item->id }}">
            <span class="slider round"></span>
        </label>
    </td>
    <td class="text-center">
        <form action="{{ route('admin.item_category.destroy', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <ul class="table-controls">

                @can(Acl::PERMISSION_ITEM_CATEGORY_EDIT)
                    <li>
                        <a href="{{ route('admin.item_category.edit', $item->id) }}" class="bs-tooltip"
                            data-toggle="tooltip" data-placement="top" title=""
                            data-original-title="{{ __('general.tooltip.edit') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-edit-2 p-1 br-6 mb-1">
                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                </path>
                            </svg>
                        </a>
                    </li>
                @endcan

                @can(Acl::PERMISSION_ITEM_CATEGORY_DELETE)
                    <li>
                        <a class="bs-tooltip delete" data-toggle="tooltip" data-placement="top" title=""
                            data-original-title="{{ __('general.tooltip.delete') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-trash p-1 br-6 mb-1">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                </path>
                            </svg>
                        </a>
                    </li>
                @endcan
            </ul>
        </form>
    </td>
</tr>
