<div class="nav">
    <div class="container-fluid">
        <div class="action" onclick="redirect('/')" data-page-trigger="'/'" data-toggle-class="active">
            <i class="fas fa-spade"></i> &nbsp;{{ __('general.head.featured') }}
        </div>
        <div class="action" onclick="redirect('/bonus')" data-page-trigger="'/bonus'" data-toggle-class="active">
            <i class="fas fa-box-usd"></i> &nbsp;{{ __('general.head.bonus') }}
        </div>
        <div class="action" onclick="redirect('/gamelist')" data-page-trigger="'/gamelist'" data-toggle-class="active">
            <i class="fas fa-box-usd"></i> &nbsp;{{ __('general.head.gamelist') }}
        </div>
        <div class="action" id="navfair" onclick="redirect('/fairness')" data-page-trigger="'/fairness'" data-toggle-class="active">
            <i class="fas fa-badge-check"></i> &nbsp;{{ __('general.head.fairness') }}
        </div>
    </div>
</div>
