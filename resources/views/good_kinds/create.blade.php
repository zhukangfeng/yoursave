@extends ('app', ['title' => trans('pages.good_kinds.title.create'), 'id' => 'good_kind_create', 'class' => 'good-kind-create', 'console' => '', 'mode' => '', 'name' => ''])

@section ('assets')
    @include ('good_kinds.assets')
@endsection

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.good_kinds.labels.create_panel_header') }}</div>
                <div class="panel-body">
                    <div class="form-data">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/good_kinds') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group required">
                                <label class="col-md-4 control-label">{{ trans('pages.good_kinds.labels.parent_name') }}</label>
                                <div class="col-md-6">
                                    <label><input type="radio" name="has_parent" value="1" {{ old('has_parent') ? '' : 'checked' }}>{{ trans('pages.good_kinds.labels.has_parent') }}</label>
                                    <label><input type="radio" name="has_parent" value="0" {{ old('has_parent') ? 'checked' : '' }}>{{ trans('pages.good_kinds.labels.no_parent') }}</label><br />
                                    <div class="parent-seach">
                                        <input type="text" name="parent_search_name" value="{{ old('parent_seach_name') }}"><label class="btn btn-default">{{ trans('pages.common.buttons.search') }}</label><br />
                                        @if (old('parent'))
                                        <label class="parent-info"><input type="radio" name="parent" value="{{ $parent }}">{{ isset($parentName) ? $parentName : '' }}</label>
                                        @endif
                                    </div>
                                    @if ($errors->has('has_parent'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('has_parent') }}</p>
                                    </div>
                                    @endif
                                    @if ($errors->has('parent'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('parent') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-4 control-label">{{ trans('pages.good_kinds.labels.child_good_kinds') }}</label>
                                <div class="col-md-6">
                                    <label><input type="radio" name="has_children" value="1" {{ old('has_children') == '0' ? '' : 'checked' }}>{{ trans('pages.good_kinds.labels.has_child_good_kinds') }}</label>
                                    <label><input type="radio" name="has_children" value="0" {{ old('has_children') == '0' ? 'checked' : '' }}>{{ trans('pages.good_kinds.labels.no_child_good_kinds') }}</label>
                                    @if ($errors->has('has_children'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('has_children') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-4 control-label">{{ trans('database.good_kinds.name') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('name') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-4 control-label">{{ trans('database.good_kinds.kind_info') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="kind_info" value="{{ old('kind_info') }}">
                                    @if ($errors->has('kind_info'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('kind_info') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">{{ trans('pages.common.buttons.create') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection