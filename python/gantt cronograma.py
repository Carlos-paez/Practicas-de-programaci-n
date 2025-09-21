"""pip install plotly pandas"""

import plotly.express as px
import pandas as pd
from datetime import datetime, timedelta

# Datos de las actividades (simplificados para el ejemplo)
data = {
    "Objetivo": [
        "Diagnosticar la necesidad de un Sitio Web Informativo",
        "Diagnosticar la necesidad de un Sitio Web Informativo",
        "Diagnosticar la necesidad de un Sitio Web Informativo",
        "Diagnosticar la necesidad de un Sitio Web Informativo",
        "Determinar la información y recursos para el sitio web",
        "Diseñar el aspecto visual y funcional del sitio web",
        "Desarrollar el Sitio Web",
        "Demostraciones del sitio web",
        "Capacitar al Personal",
        "Capacitación especial del personal",
        "Conversación con el personal",
        "Publicar el Sitio Web",
        "Publicación abierta del sitio web",
        "Verificación de la necesidad"
    ],
    "Actividad": [
        "Entrevistas no estructuradas",
        "Visitas y conversatorias con la comunidad",
        "Aplicación de encuestas",
        "Análisis y formalización de los datos",
        "Determinar información y recursos",
        "Diseñar aspecto visual y funcional",
        "Desarrollar el Sitio Web",
        "Demostraciones a docentes y personal",
        "Capacitar al personal en uso del sitio",
        "Capacitación especial del personal",
        "Conversación sobre servicios de red",
        "Publicación inicial del sitio web",
        "Publicación abierta del sitio web",
        "Verificación de la experiencia de usuario"
    ],
    "Inicio": [
        "2025-02-01", "2025-02-10", "2025-02-20", "2025-03-05",
        "2025-03-15", "2025-04-01", "2025-04-15", "2025-06-01",
        "2025-06-15", "2025-07-01", "2025-07-15", "2025-08-01",
        "2025-09-01", "2025-10-01"
    ],
    "Duración": [
        10, 10, 15, 10,
        15, 15, 45, 15,
        15, 15, 15, 30,
        30, 15
    ],
    "Estado": [
        "Realizado", "Realizado", "Realizado", "Planificado",
        "Planificado", "Planificado", "Planificado", "Planificado",
        "Planificado", "Planificado", "Planificado", "Planificado",
        "Planificado", "Planificado"
    ]
}

# Crear DataFrame
df = pd.DataFrame(data)

# Convertir fechas a datetime
df['Inicio'] = pd.to_datetime(df['Inicio'])
df['Fin'] = df['Inicio'] + pd.to_timedelta(df['Duración'], unit='d')

# Crear columna combinada de Objetivo y Actividad para el hover
df['Tarea'] = df['Objetivo'] + "<br>--- " + df['Actividad'] + " (" + df['Duración'].astype(str) + " días)"

# Crear el diagrama de Gantt
fig = px.timeline(
    df,
    x_start="Inicio",
    x_end="Fin",
    y="Actividad",
    color="Estado",
    color_discrete_map={"Realizado": "#2ecc71", "Planificado": "#95a5a6"},
    title="Cronograma de Actividades - Cyber-Zona Web Lara C.A.",
    hover_name="Tarea",
    category_orders={"Actividad": df["Actividad"].tolist()},
    template="plotly_white"
)

# Personalizar el diseño
fig.update_yaxes(autorange="reversed")  # Invertir el orden de las actividades
fig.update_layout(
    height=600,
    hoverlabel=dict(bgcolor="white", font_size=12),
    legend_title_text="Estado de la Actividad",
    legend=dict(
        orientation="h",
        yanchor="bottom",
        y=1.02,
        xanchor="right",
        x=1
    ),
    annotations=[
        dict(
            x=0.5,
            y=-0.2,
            xref="paper",
            yref="paper",
            text="<b>Leyenda:</b> Actividades en verde están realizadas, actividades en gris están planificadas",
            showarrow=False,
            font=dict(size=12)
    ]
)

# Agrupar por objetivos
for objetivo in df['Objetivo'].unique():
    # Encontrar la primera actividad de cada objetivo
    first_activity = df[df['Objetivo'] == objetivo].iloc[0]['Actividad']
    # Añadir separador de objetivo
    fig.add_annotation(
        y=first_activity,
        text=f"<b>{objetivo}</b>",
        xanchor="left",
        x=df['Inicio'].min() - timedelta(days=30),
        showarrow=False,
        font=dict(size=12, color="#34495e")
    )

# Mostrar el gráfico
fig.show()