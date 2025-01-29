from flask import Flask, jsonify
app = Flask(__name__)

@app.route('/')
def home():
    return jsonify({'message': '¡Bienvenido a la API Flask!'})

if __name__ == '__main__':
    app.run(debug=True)
