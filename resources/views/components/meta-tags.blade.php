<title>{{ $seoMetadata->meta_title ?? 'Default Title' }}</title>
<meta name="description" content="{{ $seoMetadata->meta_description ?? 'Default Description' }}">
<meta name="keywords" content="{{ implode(', ', json_decode($seoMetadata->meta_keywords, true) ?? []) }}">
<link rel="canonical" href="{{ $seoMetadata->canonical_url ?? url()->current() }}">
