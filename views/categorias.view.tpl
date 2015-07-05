<h2>Listado de Categorias</h2>
<a href="index.php?page=category&acc=ins">Agregar Nueva categoria</a>

<table style="margin:2em; width:90%">
    <tr>
        <th>
            Cod.
        </th>
        <th>
            Categoría
        </th>
        <th>
            Estado
        </th>
        <th>

        </th>
    </tr>
    {{foreach categorias}}
    <tr>
        <td>
            {{ctgid}}
        </td>
        <td>
            <a href>{{ctgdsc}}</a>
        </td>
        <td>
            {{ctgest}}
        </td>
        <td>
            <a href="index.php?page=category&acc=upd&ctgid={{ctgid}}">Actalizar</a> |
            <a href="index.php?page=category&acc=dlt&ctgid={{ctgid}}">Eliminar</a>

        </td>
    </tr>
    {{endfor categorias}}
</table>
