<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- トップページに画像を追加 -->
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">記事の一覧画面です！</h3>
                    <a href="{{ route('cities.index') }}">エリア登録一覧</a><br>
                    <a href="{{ route('cities.create') }}">エリア登録する</a><br>
                    <a href="{{ route('customers.index') }}">お客様登録一覧</a><br>
                    <a href="{{ route('customers.create') }}">お客様登録する</a>


                    <div class="flex justify-center">
                        <img src="/path/to/your/image.jpg" alt="トップページの画像" class="rounded-lg shadow-md">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
