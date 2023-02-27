<div class="space-y-4">
    <header>
        <h1 class="text-xl font-bold text-gray-900 md:text-2xl dark:text-white">
            {{ __('lunarphp-virtual-product::code-pool.pages.schemas.create.title') }}
        </h1>
    </header>

    <form action="#"
          method="POST"
          wire:submit.prevent="create">
        @include('lunarphp-virtual-product::partials.forms.code-pool-schema')
    </form>
</div>
