<div class="footer">
	<div class="col-lg-8">&copy; Company 2014</div>    
	<div class="col-lg-4">  
		<ul style='list-style-type:none;float:left'> 
			@foreach(Localization::getSupportedLocales() as $localeCode => $properties)
			<li style='float:left;padding:5px;'>
				<a rel="alternate" hreflang="{{$localeCode}}" href="{{Localization::getLocalizedURL($localeCode) }}">
					{{{ $properties['native'] }}}
				</a>
			</li>
			@endforeach
		</ul>
	</div>
</div>