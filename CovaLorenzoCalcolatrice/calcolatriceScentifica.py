import tkinter as tk
from tkinter import messagebox
import math

class Calcolatrice(tk.Tk):
    def __init__(self):
        super().__init__()
        self.title("Calcolatrice")
        self.geometry("510x685")  

        # Inizializzazione delle variabili di stato
        self.espressione = ""  # espressione corrente inserita dall'utente
        self.memoria = 0  # Variabile per la memoria
        self.ultimoValore = ""  # Variabile temporanea per memorizzare l'ultimo valore inserito nel display
        self.statoScentifico = False  # variabile per lo stato corrente del frame scientifico

        # Configurazione dello sfondo della finestra principale
        self.configure(bg="#8367C7")

        # Creazione del frame principale
        mainFrame = tk.Frame(self, bg="#8367C7")
        mainFrame.pack(padx=10, pady=10, fill=tk.BOTH, expand=True)

        # frame per il display e i tasti numerici
        displayFrame = tk.Frame(mainFrame, bg="#8367C7")
        displayFrame.grid(row=0, column=0, columnspan=4, sticky='nsew')

        # Creazione del display
        self.display = tk.Entry(displayFrame, font=("Arial", 20))
        self.display.grid(row=0, column=0, columnspan=4, sticky='nsew', padx=5, pady=5)

        # creazione dei bottoni numerici e operazioni di base
        bottoni = [
            ('7', 1, 0), ('8', 1, 1), ('9', 1, 2), ('/', 1, 3),
            ('4', 2, 0), ('5', 2, 1), ('6', 2, 2), ('*', 2, 3),
            ('1', 3, 0), ('2', 3, 1), ('3', 3, 2), ('-', 3, 3),
            ('0', 4, 0), ('.', 4, 1), ('=', 4, 2), ('+', 4, 3),
        ]

        # Creazione dei bottoni numerici e operazioni di base
        for btn_text, row, col in bottoni:
            self.creaBottoni(displayFrame, btn_text, row, col)

        # Frame per i tasti C e scientifici
        frameDiControllo = tk.Frame(mainFrame, bg="#8367C7")
        frameDiControllo.grid(row=1, column=0, columnspan=4, sticky='nsew', pady=5)

        # Creazione del tasto C
        self.creaBottoni(frameDiControllo, 'C', 0, 0)

        # Frame per i tasti scientifici
        self.frameScentifico = tk.Frame(frameDiControllo, bg="#8367C7")
        self.frameScentifico.grid(row=0, column=1, sticky='nsew', padx=5)

        # creazione dei bottoni scientifici
        bottoniScentifici = [
            ('sin', 0, 0), ('cos', 0, 1), ('tan', 0, 2),
            ('√', 1, 0), ('^', 1, 1), ('^n', 1, 2),
            ('MEM', 2, 0), ('STO', 2, 1), ('M+', 2, 2),
            ('Reciproco', 3, 0), ('Fattoriale', 3, 1),('radice n-esima', 4, 0),
            ('(', 3, 2), (')', 3, 3)
        ]

        # creazione dei bottoni scientifici
        for btn_text, row, col in bottoniScentifici:
            self.creaBottoni(self.frameScentifico, btn_text, row, col)

        # Pulsante per mostrare/nascondere i tasti scientifici
        self.bottoniScentifici = tk.Button(frameDiControllo, text="🧪", font=("Arial", 16),
                                            command=self.scentificoAttivo)
        self.bottoniScentifici.grid(row=0, column=2, sticky='nsew')

        # Nasconde il frame scientifico all'avvio del programma
        self.frameScentifico.grid_remove()

    def creaBottoni(self, frame, text, row, col):
        # Funzione per la creazione di un pulsante con testo specifico
        btn = tk.Button(frame, text=text, font=("Arial", 16), command=lambda t=text: self.clickBottone(t))
        btn.grid(row=row, column=col, sticky='nsew', padx=5, pady=5)
        if len(text) == 1:  
            btn.config(height=2, bg="#C2F8CB")  # Cambio colore sfondo bottoni numerici
        else:
            btn.config(bg="#B3E9C7")  # Cambio colore sfondo bottoni operazioni

    def clickBottone(self, text):
        # Funzione chiamata quando un pulsante viene premuto
        if self.espressione == "Errore":
            if text != 'C':
                messagebox.showerror("Errore", "La calcolatrice è in errore. Premere il tasto C per continuare.")
                return
            else:
                self.display.delete(0, tk.END)
                self.espressione = ""
                if self.statoScentifico:
                    self.scentificoAttivo()
                return

        if text == '=':
            # Calcola il risultato dell'espressione e lo mostra nel display
            try:
                result = eval(self.espressione)
                self.display.delete(0, tk.END)
                self.display.insert(tk.END, str(result))
            except Exception as e:
                self.display.delete(0, tk.END)
                self.display.insert(tk.END, "Errore")
                self.espressione = "Errore"
        elif text == 'C':
            # Cancela l'espressione corrente
            self.display.delete(0, tk.END)
            self.espressione = ""
            if self.statoScentifico:
                self.scentificoAttivo()
        elif text in ('sin', 'cos', 'tan'):
            # aggiunge la funzione trigonometrica all'espressione
            self.calculate_trig_function(text)
        elif text in ('√'):
            self.espressione = '**(1/2)'
            self.display.insert(tk.END, '√')
        elif text == '^':
            # Aggiunge l'operatore di elevamento a potenza all'espressione
            self.espressione += '**2'
            self.display.insert(tk.END, '^2')
        elif text == '^n':
            # Aggiunge l'operatore di elevamento a potenza generico all'espressione
            self.espressione += '**'
            self.display.insert(tk.END, '^n')
        elif text == 'radice n-esima':
            # Aggiunge la radice n-esima all'espressione
            self.espressione += '**(1/'
            self.display.insert(tk.END, '^(1/')
        elif text == 'MEM':
            # Mostra il valore memorizzato nella memoria
            self.display.delete(0, tk.END)
            self.display.insert(tk.END, str(self.memoria))
        elif text == 'STO':
            # Memorizza il valore numerico corrente nella memoria
            self.memoria = float(''.join(filter(str.isdigit, self.espressione)))
        elif text == 'M+':
            # Aggiunge il valore numerico corrente alla memoria
            try:
                valoreCorrente = float(self.display.get())
                self.display.delete(0, tk.END)
                self.display.insert(tk.END, str(valoreCorrente + self.memoria))
            except ValueError:
                messagebox.showerror("Errore", "Impossibile eseguire l'operazione. Assicurarsi che il valore visualizzato sia un numero.")
        elif text == 'Reciproco':
            # Calcola il reciproco del valore corrente
            try:
                valoreCorrente = float(self.display.get())
                self.display.delete(0, tk.END)
                self.display.insert(tk.END, str(1 / valoreCorrente))
            except ValueError:
                messagebox.showerror("Errore", "Impossibile eseguire l'operazione. Assicurarsi che il valore visualizzato sia un numero diverso da zero.")
            except ZeroDivisionError:
                messagebox.showerror("Errore", "Impossibile dividere per zero.")
        elif text == 'Fattoriale':
            # Calcola il fatoriale del valore corrente
            try:
                valoreCorrente = int(self.display.get())
                if valoreCorrente < 0:
                    messagebox.showerror("Errore", "Il fattoriale è definito solo per numeri interi non negativi.")
                else:
                    result = math.factorial(valoreCorrente)
                    self.display.delete(0, tk.END)
                    self.display.insert(tk.END, str(result))
            except ValueError:
                messagebox.showerror("Errore", "Il fattoriale è definito solo per numeri interi non negativi.")
        else:
            # aggiunge il testo del pulsante all'espressione
            self.espressione += text
            self.display.insert(tk.END, text)

    def scentificoAttivo(self):
        # funzione per mostrare/nascondere i tasti scientifici
        if self.statoScentifico:
            self.frameScentifico.grid_remove()
            self.bottoniScentifici.config(text="🧪")
            self.statoScentifico = False
        else:
            self.frameScentifico.grid(row=0, column=1, sticky='nsew', padx=5)
            self.bottoniScentifici.config(text="Hide")
            self.statoScentifico = True

    def calculate_trig_function(self, function_name):
        try:
            angle = float(self.display.get())
            if function_name == 'sin':
                result = math.sin(math.radians(angle))
            elif function_name == 'cos':
                result = math.cos(math.radians(angle))
            elif function_name == 'tan':
                result = math.tan(math.radians(angle))
            self.display.delete(0, tk.END)
            self.display.insert(tk.END, str(result))
        except ValueError:
            messagebox.showerror("Errore", "Impossibile eseguire l'operazione. Assicurarsi che il valore visualizzato sia un numero.")

if __name__ == "__main__":
    app = Calcolatrice()
    app.mainloop()