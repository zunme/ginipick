<div class="pagenate-wrap">
	<template x-if="pagenate && pagenate.last_page > 1">
		<div class="pagewrap flex justify-center gap-2 my-4 !text-xs" x-show="pagenate.endPage >= 1">
			<template x-if="pagenate.toStart">
				<span @click="getList(1)" class="cursor-pointer">&lt;&lt;</span>
			</template>
			<template x-if="!pagenate.toStart">
				<span class="disabled">&lt;&lt;</span>
			</template>

			<template x-if="pagenate.toPrev">
				<span @click="getList(pagenate.toPrev)" class="cursor-pointer">&lt;</span>
			</template>
			<template x-if="!pagenate.toPrev">
				<span class="disabled">&lt;</span>
			</template>

			<template x-for="page in pagenate.pages">
				<span @click="getList(page)" x-text="page"  class="cursor-pointer"
					:class="{'current_page': page == pagenate.current_page}"></span>
			</template>

			<template x-if="pagenate.toNext">
				<span @click="getList(pagenate.toNext)" class="cursor-pointer">&gt;</span>
			</template>
			<template x-if="!pagenate.toNext">
				<span class="disabled">&gt;</span>
			</template>

			<template x-if="pagenate.toLast">
				<span @click="getList(pagenate.toLast)" class="cursor-pointer">&gt;&gt;</span>
			</template>
			<template x-if="!pagenate.toLast">
				<span class="disabled">&gt;&gt;</span>
			</template>
		</div>
	</template>
</div>