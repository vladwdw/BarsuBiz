from docx import Document
from fpdf import FPDF
from pathlib import Path
import os


# Получаем путь к текущему исполняемому файлу (.exe)
exe_dir = os.path.dirname(os.path.abspath(__file__))

    # Имя папки, которую вы хотите создать
new_folder_name = "Новая_папка"

    # Полный путь к новой папке
new_folder_path = os.path.join(exe_dir, new_folder_name)

# Проверяем, существует ли папка, и, если нет, создаем её

os.mkdir(new_folder_path)
print(new_folder_path)
    