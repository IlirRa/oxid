[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"}]

<style>
    .ml-iframe-wrapper {
        width: 100%;
        height: calc(100vh - 90px);
    }

    .ml-iframe {
        width: 100%;
        height: 100%;
        border: 0;
        background: #fff;
    }
</style>

<div class="ml-iframe-wrapper">
    <iframe
        class="ml-iframe"
        src="[{$mlIframeUrl|oxescape:'html'}]"
        title="magnalister"
        referrerpolicy="strict-origin-when-cross-origin"
    ></iframe>
</div>

[{include file="bottomitem.tpl"}]
