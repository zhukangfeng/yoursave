<div class="summmary">
    <div class="summary-time datetime">
        <span class="week-summary">
            <label class="control-label">{{ trans('pages.consumes.labels.last_week_cost') }}: {{ isset($consumes->last_week_cost) ? $consumes->last_week_cost : '' }}</label>
        </span>
        <span class="month-summary">
            <label class="control-label">{{ trans('pages.consumes.labels.last_month_cost') }}: {{ isset($consumes->last_month_cost) ? $consumes->last_month_cost : '' }}</label>
        </span>
        <span class="three-month-summary">
            <label class="control-label">{{ trans('pages.consumes.labels.last_three_months_cost') }}: {{ isset($consumes->last_three_months_cost) ? $consumes->last_three_months_cost : '' }}</label>
        </span>
        <span class="six-month-summary">
            <label class="control-label">{{ trans('pages.consumes.labels.last_sex_months_cost') }}: {{ isset($consumes->last_sex_months_cost) ? $consumes->last_sex_months_cost : '' }}</label>
        </span>
        <span class="year-summary">
            <label class="control-label">{{ trans('pages.consumes.labels.last_year_cost') }}: {{ isset($consumes->last_year_cost) ? $consumes->last_year_cost : '' }}</label>
        </span>
    </div>
</div>