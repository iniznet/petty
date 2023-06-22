<?php view('sections.admin.header'); ?>

<main x-data="{add_modal: false, edit_modal: false, chapter: {}}">
	<div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
		<div class="mb-1 w-full">
			<div class="mb-4">
				<nav class="flex mb-5" aria-label="Breadcrumb">
					<ol class="inline-flex items-center space-x-1 md:space-x-2">
						<li class="inline-flex items-center">
							<a href="#" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
								<svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
									<path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
								</svg>
								Home
							</a>
						</li>
						<li>
							<div class="flex items-center">
								<svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
								</svg>
								<a href="#" class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Chapter</a>
							</div>
						</li>
						<li>
							<div class="flex items-center">
								<svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
								</svg>
								<span class="text-gray-400 ml-1 md:ml-2 text-sm font-medium" aria-current="page">List</span>
							</div>
						</li>
					</ol>
				</nav>
				<h1 class="text-xl sm:text-2xl font-semibold text-gray-900">All Chapter</h1>
			</div>
			<div class="sm:flex">
				<div class="hidden sm:flex items-center sm:divide-x sm:divide-gray-100 mb-3 sm:mb-0">
					<form class="lg:pr-3" action="#" method="GET">
						<label for="crud-search" class="sr-only">Search</label>
						<div class="mt-1 relative lg:w-64 xl:w-96">
							<input type="text" name="search" id="crud-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Search for a chapter" value="<?php echo $search ?>">
						</div>
					</form>
					<div class="flex space-x-1 pl-0 sm:pl-2 mt-3 sm:mt-0">
						<a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
							<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
							</svg>
						</a>
						<a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
							<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
							</svg>
						</a>
						<a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
							<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
							</svg>
						</a>
						<a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
							<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
								<path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
							</svg>
						</a>
					</div>
				</div>
				<div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
					<button type="button" data-modal-toggle="add-chapter-modal" class="w-1/2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto" @click="add_modal = true">
						<svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
						</svg>
						Add chapter
					</button>
				</div>
			</div>
		</div>
	</div>

	<div class="flex flex-col">
		<div class="overflow-x-auto">
			<div class="align-middle inline-block min-w-full">
				<div class="shadow overflow-hidden">
					<table class="table-fixed min-w-full divide-y divide-gray-200">
						<thead class="bg-gray-100">
							<tr>
								<th scope="col" class="p-4">
									<div class="flex items-center">
										<input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
										<label for="checkbox-all" class="sr-only">checkbox</label>
									</div>
								</th>
								<th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
									Title
								</th>
								<th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
									Series
								</th>
								<th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
									Group
								</th>
								<th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
									Link
								</th>
								<th scope="col" class="p-4">
								</th>
							</tr>
						</thead>
						<tbody class="bg-white divide-y divide-gray-200">
							<?php foreach ($chapters as $post) : ?>
								<tr class="hover:bg-gray-100">
									<td class="p-4 w-4">
										<div class="flex items-center">
											<input id="checkbox-1" aria-describedby="checkbox-1" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
											<label for="checkbox-1" class="sr-only">checkbox</label>
										</div>
									</td>
									<td class="p-4 whitespace-nowrap text-base font-medium text-gray-900"><?php echo $post->title; ?></td>
									<td class="p-4 whitespace-nowrap text-base font-medium text-gray-900"><?php echo $post->series->title; ?></td>
									<td class="p-4 whitespace-nowrap text-base font-medium text-gray-900"><?php echo $post->group->title; ?></td>
									<td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
										<a href="<?php echo $post->url ?>" target="_blank">External Link</a>
									</td>
									<td class="p-4 whitespace-nowrap space-x-2">
										<button type="button" data-modal-toggle="user-modal" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center" data-id="<?php echo $post->id; ?>" @click='edit_modal = true; chapter = <?php echo json_encode($post); ?>'>
											<svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
												<path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
												<path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
											</svg>
											Edit
										</button>
										<a href="<?php echo route('get', 'admin.chapters.destroy', ['id' => $post->id]) ?>" data-modal-toggle="delete-user-modal" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center" onclick="return confirm('Are you sure you want to delete this chapter?')">
											<svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
											</svg>
											Delete
										</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full flex" aria-modal="true" role="dialog" x-show="add_modal" x-cloak>
		<div class="relative w-full max-w-2xl px-4 h-full md:h-auto" @click.away="add_modal = false">

			<div class="bg-white rounded-lg shadow relative">

				<div class="flex items-start justify-between p-5 border-b rounded-t">
					<h3 class="text-xl font-semibold">
						Add new chapter
					</h3>
					<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="add-chapter-modal" @click.prevent="add_modal = false">
						<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
						</svg>
					</button>
				</div>

				<div class="p-6 space-y-6">
					<form action="<?php echo route('post', 'admin.chapters'); ?>" method="POST" x-ref="add_form">
						<div class="grid grid-cols-6 gap-6">
							<div class="col-span-6 sm:col-span-3">
								<label for="title" class="text-sm font-medium text-gray-900 block mb-2">Title</label>
								<input type="text" name="title" id="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Bonnie" required="">
							</div>
							<div class="col-span-6 sm:col-span-3">
								<label for="series" class="text-sm font-medium text-gray-900 block mb-2">Series</label>
								<select id="series" name="series" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
									<?php foreach ($series as $series) : ?>
										<option value="<?php echo $series->id; ?>"><?php echo $series->title; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="col-span-6 sm:col-span-3">
								<label for="group" class="text-sm font-medium text-gray-900 block mb-2">Group</label>
								<select id="group" name="group" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
									<?php foreach ($groups as $group) : ?>
										<option value="<?php echo $group->id; ?>"><?php echo $group->title; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="col-span-6">
								<label for="url" class="text-sm font-medium text-gray-900 block mb-2">URL</label>
								<input type="url" name="url" id="url" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="https://petty.test">
							</div>
						</div>
					</form>
				</div>

				<div class="items-center p-6 border-t border-gray-200 rounded-b">
					<button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit" @click.prevent="$refs.add_form.submit()">Add chapter</button>
				</div>

			</div>
		</div>
	</div>

	<!-- Edit Modal, fetch data from /admin/chapter/get?id=1 -->
	<div class="overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full flex" aria-modal="true" role="dialog" x-show="edit_modal" x-cloak>
		<div class="relative w-full max-w-2xl px-4 h-full md:h-auto" @click.away="edit_modal = false">

			<div class="bg-white rounded-lg shadow relative">

				<div class="flex items-start justify-between p-5 border-b rounded-t">
					<h3 class="text-xl font-semibold">
						Edit chapter
					</h3>
					<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="edit-chapter-modal" @click.prevent="edit_modal = false">
						<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
						</svg>
					</button>
				</div>

				<div class="p-6 space-y-6">
					<form action="<?php echo route('post', 'admin.chapters.update'); ?>" method="POST" x-ref="edit_form">
						<div class="grid grid-cols-6 gap-6">
							<div class="col-span-6 sm:col-span-3">
								<label for="title" class="text-sm font-medium text-gray-900 block mb-2">Title</label>
								<input type="text" name="title" id="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Bonnie" x-model="chapter.title" required="">
							</div>
							<div class="col-span-6 sm:col-span-3">
								<label for="series" class="text-sm font-medium text-gray-900 block mb-2">Series</label>
								<select id="series" name="series" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" x-model="chapter.series">
									<?php foreach ($series as $series) : ?>
										<option value="<?php echo $series->id; ?>"><?php echo $series->title; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="col-span-6 sm:col-span-3">
								<label for="group" class="text-sm font-medium text-gray-900 block mb-2">Group</label>
								<select id="group" name="group" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" x-model="chapter.group">
									<?php foreach ($groups as $group) : ?>
										<option value="<?php echo $group->id; ?>"><?php echo $group->title; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="col-span-6">
								<label for="url" class="text-sm font-medium text-gray-900 block mb-2">URL</label>
								<input type="url" name="url" id="url" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="https://petty.test" x-model="chapter.url">
							</div>
						</div>
						<input type="hidden" name="id" x-model="chapter.id">
					</form>
				</div>

				<div class="items-center p-6 border-t border-gray-200 rounded-b">
					<button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit" @click.prevent="$refs.edit_form.submit()">Update chapter</button>
				</div>

			</div>
		</div>
	</div>

</main>

<?php view('sections.admin.footer'); ?>