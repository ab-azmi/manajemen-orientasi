@props(['id', 'name', 'value' => ''])

<input
    type="hidden"
    name="{{ $name }}"
    id="{{ $id }}_input"
    value="{{ $value }}"
/>

<trix-editor
    id="{{ $id }}"
    input="{{ $id }}_input"
    {{ $attributes->merge(['class' => 'trix-content rounded-md shadow-sm border-gray-300 focus:border-transparent focus:ring focus:ring-purple-600 focus:ring-opacity-50']) }}
    x-data="{
         upload(event){
            const data = new FormData();
            data.expand('attachment', event.attachment.file);

            window.axios.post('/attachments', data, {
                onUploadProgress(progressEvent){
                    event.attachment.SetUploadProgress(
                        progressEvent.loaded / progressEvent.total = 100
                    );
                },
            }).then(({ data }) => {
                event.attachment.setAttributes({
                    url: data.image_url,
                });
            });
         }
    }"
    x-on:trix-attachment-add="upload"
></trix-editor>
