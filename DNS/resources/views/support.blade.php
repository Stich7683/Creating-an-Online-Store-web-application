<style>
    .contact-container {
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        height: 99vh;
        padding-bottom: 20px; /* Дополнительное пространство от нижнего края */
    }
    .contact-info {
        background: #2c3e50;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        text-align: center;
    }
    .contact-info h6 {
        font-size: 1.5em;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .contact-info p {
        font-size: 1.2em;
        line-height: 1.8;
        text-align: left;
        display: inline-block;
        margin: 0 auto;
    }
    .contact-info strong {
        font-weight: bold;
        color: #ffc107;
    }
</style>
@extends('class')
@section('main_content')
    <div class="contact-container d-flex flex-column justify-content-end">
        <div class="contact-info text-white p-4 bg-dark rounded shadow text-center">
            <h6>Если у вас есть какие-то вопросы, можете связаться с нами по контактным данным ниже:</h6>
            <p class="text-start">
                <strong>Телефон:</strong> +79771374175<br>
                <strong>Email:</strong> help@compmaster.ru<br>
                <strong>Почта для юридических лиц:</strong> b2b@compmaster.ru<br>
                <strong>По вопросам, связанным с доставкой:</strong> help@deliver.compmaster.ru<br>
                <strong>Правоохранительным органам:</strong> sec_docrequest@compmaster.ru — почта для запросов правоохранительных органов государственной власти.<br>
                <strong>Телефон для уточнения статуса выполнения запроса:</strong> +7 958 300-00-07 доб. 86077<br>
                <strong>Режим работы:</strong> с 09:00 до 18:00 по московскому времени.
            </p>
        </div>
    </div>
@endsection
