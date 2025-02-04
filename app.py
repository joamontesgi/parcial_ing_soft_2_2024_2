from flask import Flask, jsonify
from flask import request
app = Flask(__name__)


@app.route('/')
def home():
    return jsonify({'message': '¡Bienvenido a la API Flask!'})


@app.route('/convertir', methods=['POST'])
def post():
    dato = request.get_json()
    dato["valor"] = (dato["valor"] - 2 ) * 5/9
    return jsonify(dato)

if __name__ == '__main__':
    app.run(debug=True)
