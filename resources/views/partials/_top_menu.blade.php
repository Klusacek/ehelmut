
<div class="ui inverted segment">
    <div class="ui fluid container">
      <div class="ui large secondary inverted pointing menu">
        <a class="toc item">
          <i class="sidebar icon"></i>
        </a>
        <a href="/zakazka/new" class="active item">Nová zakázka</a>
        <div class="right item">
          <div class="ui feed">
            <div class="event">
                <div class="label">
                  <img src="{{ asset('/assets/images/avatar/') }}/{{ Auth::user()->id }}.jpg">
                </div>
                <div class="content">
                  <div class="summary">
                     <a>{{ Auth::user()->jmeno }} {{ Auth::user()->prijmeni }}</a> 
                 </div>
                </div>
            </div> 
          </div>
        </div>
      </div>
    </div>

  </div>